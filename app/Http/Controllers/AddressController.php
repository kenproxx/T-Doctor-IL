<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    public function getListProvince(Request $request)
    {
        $provinces = Province::where('nation_id', $request->input('nation_id'))->get();
        return response()->json($provinces);
    }

    public function getListDistrict(Request $request)
    {
        $districts = District::where('province_code', $request->input('province_id'))->get();
        return response()->json($districts);
    }

    public function getListCommune(Request $request)
    {
    }
}
