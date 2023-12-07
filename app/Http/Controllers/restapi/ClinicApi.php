<?php

namespace App\Http\Controllers\restapi;

use App\Enums\ClinicStatus;
use App\Enums\ReviewStatus;
use App\Enums\TypeBusiness;
use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Commune;
use App\Models\Department;
use App\Models\District;
use App\Models\Province;
use App\Models\Review;
use App\Models\ServiceClinic;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClinicApi extends Controller
{
    public function getAll()
    {
        $clinics = DB::table('clinics')
            ->join('users', 'users.id', '=', 'clinics.user_id')
            ->where('clinics.status', ClinicStatus::ACTIVE)
            ->where('clinics.type', TypeBusiness::CLINICS)
            ->select('clinics.*', 'users.email')
            ->cursor()
            ->map(function ($item) {
                $array = explode(',', $item->service_id);
                $services = ServiceClinic::whereIn('id', $array)->get();
                $array = explode(',', $item->address);
                $addressP = Province::where('id', $array[1] ?? null)->first();
                $addressD = District::where('id', $array[2] ?? null)->first();
                $addressC = Commune::where('id', $array[3] ?? null)->first();
                $clinic = (array)$item;

                $reviews = Review::where('clinic_id', $item->id)
                    ->where('status', ReviewStatus::APPROVED)
                    ->get();
                $totalReview = $reviews->count();
                $totalStar = $reviews->sum('star');
                $calcReview = ($totalReview > 0) ? ($totalStar / $totalReview) : 0;

                $clinic['total_reviews'] = $totalReview;
                $clinic['calc_reviews'] = $calcReview;
                $clinic['total_star'] = $totalStar;

                $clinic['total_services'] = $services->count();
                $clinic['services'] = $services->toArray();
                if ($addressP == null) {
                    $clinic['addressInfo'] = '';
                    return $clinic;
                }
                $clinic['addressInfo'] = $addressC['name'] . ',' . $addressD['name'] . ',' . $addressP['name'];
                return $clinic;
            });

        return response()->json($clinics);
    }

    public function searchByDepartmentAndSymptoms(Request $request)
    {
        $symptomID = $request->input('symptom');
        $department = $request->input('department');

        $clinics = DB::table('clinics')
            ->join('users', 'users.id', '=', 'clinics.user_id')
            ->where('clinics.status', ClinicStatus::ACTIVE)
            ->where('clinics.type', TypeBusiness::CLINICS);

        if ($symptomID && $department) {
            $clinics->whereRaw("FIND_IN_SET(?, department) > 0", [$department])
                ->whereRaw("FIND_IN_SET(?, symptom) > 0", [$symptomID]);
        } else {
            $clinics->where(function ($query) use ($symptomID, $department) {
                $query->whereRaw("FIND_IN_SET(?, symptom) > 0", [$symptomID])
                    ->orWhereRaw("FIND_IN_SET(?, department) > 0", [$department]);
            });
        }

        $clinics = $clinics->select('clinics.*', 'users.email')
            ->cursor()
            ->map(function ($item) {
                /*Find service*/
                $array = explode(',', $item->service_id);
                $services = ServiceClinic::whereIn('id', $array)->get();
                /*Find Address*/
                $array = explode(',', $item->address);
                $addressP = Province::where('id', $array[1] ?? null)->first();
                $addressD = District::where('id', $array[2] ?? null)->first();
                $addressC = Commune::where('id', $array[3] ?? null)->first();
                /*Find department*/
                $list_departments = explode(',', $item->department);
                $departments = Department::whereIn('id', $list_departments)->get();
                /*Find symptom*/
                $list_symptoms = explode(',', $item->symptom);
                $symptoms = Symptom::whereIn('id', $list_symptoms)->get();
                /* Convert to array*/
                $clinic = (array)$item;
                /* Count review*/
                $reviews = Review::where('clinic_id', $item->id)
                    ->where('status', ReviewStatus::APPROVED)
                    ->get();
                $totalReview = $reviews->count();
                $totalStar = $reviews->sum('star');
                $calcReview = ($totalReview > 0) ? ($totalStar / $totalReview) : 0;

                $clinic['total_reviews'] = $totalReview;
                $clinic['total_star'] = $totalStar;
                $clinic['calc_reviews'] = $calcReview;
                /*Show service*/
                $clinic['total_services'] = $services->count();
                $clinic['services'] = $services->toArray();
                /*Merge address*/
                if ($addressP == null) {
                    $clinic['addressInfo'] = '';
                    return $clinic;
                }
                $clinic['addressInfo'] = $addressC['name'] . ',' . $addressD['name'] . ',' . $addressP['name'];
                /* Show departments*/
                $clinic['total_departments'] = $departments->count();
                $clinic['departments'] = $departments->toArray();
                /* Show symptoms*/
                $clinic['total_symptoms'] = $symptoms->count();
                $clinic['symptoms'] = $symptoms->toArray();
                return $clinic;
            });

        return response()->json($clinics);
    }


    public function detail($id)
    {
        $clinic = Clinic::find($id);
        if (!$clinic || $clinic->status != ClinicStatus::ACTIVE) {
            return response("Clinic not found", 404);
        }
        $user = User::find($clinic->user_id);
        $response = $clinic->toArray();
        $response['email'] = $user->email;
        return response()->json($response);
    }

    public function getAllByUserId($id)
    {
        $clinics = DB::table('clinics')
            ->join('users', 'users.id', '=', 'clinics.user_id')
            ->where('clinics.status', ClinicStatus::ACTIVE)
            ->where('clinics.type', TypeBusiness::CLINICS)
            ->where('clinics.user_id', $id)
            ->select('clinics.*', 'users.email')
            ->get();
        return response()->json($clinics);
    }
}
