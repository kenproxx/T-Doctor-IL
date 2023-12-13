<?php

namespace App\Http\Controllers;

use App\Enums\ClinicStatus;
use App\Enums\UserStatus;
use App\Models\Clinic;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $loginRequest = $request->input('email');
            $password = $request->input('password');

            $credentials = [
                'email' => $loginRequest,
                'password' => $password,
            ];

            $user = User::where('email', $loginRequest)->first();
            if (!$user) {
                toast('Account not found!', 'error', 'top-left');
                return back();
            } else {
                if ($user) {
                    switch ($user->status) {
                        case UserStatus::ACTIVE:
                            break;
                        case UserStatus::INACTIVE:
                            toast('Account not active!', 'error', 'top-left');
                            return back();
                        case UserStatus::BLOCKED:
                            toast('Account has been blocked!', 'error', 'top-left');
                            return back();
                        case UserStatus::DELETED:
                            toast('Account has been deleted!', 'error', 'top-left');
                            return back();
                        case UserStatus::PENDING:
                            toast('Account is pending!', 'error', 'top-left');
                            return back();
                    }
                }
            }

            if (Auth::attempt($credentials)) {
                $token = JWTAuth::fromUser($user);
                setCookie('accessToken', $token);
                toast('Welcome ' . $user->email, 'success', 'top-left');

                $role_user = DB::table('role_users')->where('user_id', $user->id)->first();
                $roleNames = Role::where('id', $role_user->role_id)->pluck('name');

                if ($roleNames->contains('DOCTORS') || $roleNames->contains('PHAMACISTS') || $roleNames->contains('THERAPISTS') || $roleNames->contains('ESTHETICIANS') || $roleNames->contains('NURSES') || $roleNames->contains('PHARMACEUTICAL COMPANIES') || $roleNames->contains('HOSPITALS') || $roleNames->contains('CLINICS') || $roleNames->contains('PHARMACIES') || $roleNames->contains('SPAS') || $roleNames->contains('OTHERS') || $roleNames->contains('ADMIN')) {
                    return redirect(route('admin.home'));
                }

                return redirect(route('home'));
            } else {
                toast('Email or password incorrect', 'error', 'top-left');
            }
            return back();
        } catch (Exception $exception) {
            toast('Error, Please try again!', 'error', 'top-left');
            return back();
        }
    }

    public function register(Request $request)
    {
        try {
            $email = $request->input('email');
            $username = $request->input('username');
            $password = $request->input('password');
            $passwordConfirm = $request->input('passwordConfirm');
            $member = $request->input('member');
            $type = $request->input('type');
            $openDate = $request->input('open_date');
            $closeDate = $request->input('close_date');
            $province_id = $request->input('province_id');
            $district_id = $request->input('district_id');
            $commune_id = $request->input('commune_id');
            $address_detail = $request->input('address');
            $time_work = $request->input('time_work');

            $address = $request->input('combined_address');
            $representative = $request->input('representative');
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');
            $experienceHospital = $request->input('experienceHospital');
            if ($province_id && $district_id && $commune_id) {
                $province = explode('-', $province_id);
                $district = explode('-', $district_id);
                $commune = explode('-', $commune_id);
            }

            $currentDate = Carbon::now();


            $user = new User();

            $checkPending = false;

            $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isEmail) {
                toast('Email invalid!', 'error', 'top-left');
                return back();
            }

            $oldUser = User::where('email', $email)->first();
            if ($oldUser) {
                toast('Email already exited!', 'error', 'top-left');
                return back();
            }

            $oldUser = User::where('username', $username)->first();
            if ($oldUser) {
                toast('Username already exited!', 'error', 'top-left');
                return back();
            }

            if ($password != $passwordConfirm) {
                toast('Password or Password Confirm incorrect!', 'error', 'top-left');
                return back();
            }

            if (strlen($password) < 5) {
                toast('Password invalid!', 'error', 'top-left');
                return back();
            }

            if ($type == \App\Enums\Role::BUSINESS) {
                // kiểm tra xem fileupload có tồn tại không, nếu không th ì thông báo lỗi
                if (!$request->hasFile('fileupload')) {
                    toast('Cần up file giấy phép kinh doanh', 'error', 'top-left');
                    return back();
                }
                $item = $request->file('fileupload');
                $itemPath = $item->store('license', 'public');
                $img = asset('storage/' . $itemPath);
                $user->business_license_img = $img;
                $checkPending = true;
            }

            if ($type == \App\Enums\Role::MEDICAL) {
                // kiểm tra xem fileupload có tồn tại không, nếu không th ì thông báo lỗi
                if (!$request->hasFile('fileupload')) {
                    toast('Cần up file giấy phép hành nghề', 'error', 'top-left');
                    return back();
                }
                $item = $request->file('fileupload');
                $itemPath = $item->store('license', 'public');
                $img = asset('storage/' . $itemPath);
                $user->medical_license_img = $img;
                $checkPending = true;
            }

            $passwordHash = Hash::make($password);

            $user->email = $email;
            if ($member == \App\Enums\Role::DOCTORS) {
                $name_doctor = $request->input('name_doctor');
                $contact_phone = $request->input('contact_phone');
                $experience = $request->input('experience');
                $hospital = $request->input('hospital');
                $specialized_services = $request->input('specialized_services');
                $services_info = $request->input('services_info');
                $user->name = $name_doctor;
                $user->phone = $contact_phone;
                $user->year_of_experience = $experience ?? '';
                $user->hospital = $hospital ?? '';
                $user->specialty = $specialized_services ?? '';
                $user->service = $services_info ?? '';
                $user->prescription = $request->input('prescription');
                $user->free = $request->input('free');
            } else {
                $user->name = '';
                $user->phone = '';
            }

            $user->last_name = '';
            $user->password = $passwordHash;
            $user->username = $username;
            $user->address_code = '';
            $user->type = $type;
            $user->member = $member;
            if ($checkPending) {
                $user->status = UserStatus::PENDING;
            } else {
                $user->status = UserStatus::ACTIVE;
            }

            $success = $user->save();
            if ($success) {
                (new MainController())->createRoleUser($member, $username);

                if ($user->member == 'DOCTORS') {
                    auth()->login($user, true);
                    toast('Register success!', 'success', 'top-left');
                    return redirect()->route('profile');
                }
                if ($user->member == 'HOSPITALS') {

                    $openDateTime = Carbon::createFromFormat('Y-m-d H:i', $currentDate->format('Y-m-d') . ' ' . $openDate);
                    $closeDateTime = Carbon::createFromFormat('Y-m-d H:i', $currentDate->format('Y-m-d') . ' ' . $closeDate);
                    $formattedOpenDateTime = $openDateTime->format('Y-m-d\TH:i');
                    $formattedCloseDateTime = $closeDateTime->format('Y-m-d\TH:i');

                    $hospital = new Clinic();
                    $hospital->address_detail = $address_detail;
                    $hospital->address = ','.$province[0].','.$district[0].','.$commune[0];

                    $hospital->name = $representative;
                    $hospital->latitude = $latitude;
                    $hospital->longitude = $longitude;
                    $hospital->open_date = $formattedOpenDateTime ?? '';
                    $hospital->close_date = $formattedCloseDateTime ?? '';
                    $hospital->experience = $experienceHospital;
                    $hospital->gallery = $img ?? '';
                    $hospital->user_id = $user->id;
                    $hospital->time_work = $time_work;
                    $hospital->status = ClinicStatus::ACTIVE;
                    $hospital->type = 'HOSPITALS';
                    $hospital->save();

                    $newUser = User::find($user->id);
                    $newUser->province_id = $province[0];
                    $newUser->district_id = $district[0];
                    $newUser->commune_id = $commune[0];
                    $newUser->address_code = $province[2];
                    $newUser->detail_address = $address_detail;
                    $newUser->year_of_experience = $experienceHospital;
                    $newUser->bac_si_dai_dien = $representative;
                    $newUser->name = $representative;
                    $newUser->save();


                    toast('Register success!', 'success', 'top-left');
                    return redirect()->route('home');

                }

                toast('Register success!', 'success', 'top-left');
                return redirect(route('home'));
            }
            toast('Register fail!', 'error', 'top-left');
            return back();
        } catch (Exception $exception) {
            toast('Error, Please try again!', 'error', 'top-left');
            return back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        setCookie('accessToken', null);
        return redirect('/');
    }

    public function setCookie($name, $value)
    {
        $minutes = 3600;
        $response = new Response('Set Cookie');
        $response->withCookie(cookie($name, $value, $minutes));
        return $response;
    }
}
