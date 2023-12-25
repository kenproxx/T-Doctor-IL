<?php

namespace App\Http\Controllers;

use App\Models\FamilyManagement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class FamilyManagementController extends Controller
{
    public function index()
    {
    }


    public function create()
    {
    }

    public function store(Request $request)
    {


    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }


    public function indexApi($user_id)
    {

    }

    public function createApi(Request $request, $user_id)
    {
        $user = User::where('id', $user_id)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Không tìm thấy người dùng',
            ], 400);
        }

        $family = FamilyManagement::where('user_id', $user_id)->first();

        if ($family) {
            return response()->json([
                'message' => 'Nguời dùng đã có thông tin gia đình',
            ], 400);
        }

        try {
            $this->validParam($request);
        } catch (ValidationException $exception) {
            return response()->json(['errors' => $exception->errors()], 400);
        }

        $family = new FamilyManagement();
        $family->user_id = $user_id;
        $family->family_code = (new MainController())->generateRandomString(10);

        $params = $request->only('relationship', 'name', 'date_of_birth', 'number_phone', 'email', 'sex', 'province_id',
            'district_id', 'ward_id', 'detail_address');
        $family->fill($params);

        $success = $family->save();

        if ($success) {
            return response()->json([
                'message' => 'Thêm thông tin gia đình thành công',
            ], 200);
        }
        return response()->json([
            'message' => 'Thêm thông tin gia đình thất bại',
        ], 400);
    }

    private function validParam($request)
    {
        $request->validate([
            'email' => [
                'string',
                'email',
                'max:255',
                Rule::unique('family_management', 'email')->ignore($request->input('email')),
            ],
            'number_phone' => [
                'numeric',
                'digits_between:8,12',
                Rule::unique('family_management', 'number_phone')->ignore($request->input('number_phone')),
            ],
        ]);
    }

    public function storeApi(Request $request, $current_user_id, $user_id)
    {
        $user = User::where('id', $user_id)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Không tìm thấy người dùng',
            ], 400);
        }

        $family = FamilyManagement::where('user_id', $user_id)->first();

        if ($family) {
            return response()->json([
                'message' => 'Nguời dùng đã có thông tin gia đình',
            ], 400);
        }

        try {
            $this->validParam($request);
        } catch (ValidationException $exception) {
            return response()->json(['errors' => $exception->errors()], 400);
        }

        $familyCurrentUser = FamilyManagement::where('user_id', $current_user_id)->first();

        if (!$familyCurrentUser) {
            return response()->json([
                'message' => 'Nguời dùng chưa có thông tin gia đình',
            ], 400);
        }

        $family = new FamilyManagement();

        $family->user_id = $user_id;
        $family->family_code = $familyCurrentUser->family_code;


        $params = $request->only('relationship', 'name', 'date_of_birth', 'number_phone', 'email', 'sex', 'province_id',
            'district_id', 'ward_id', 'detail_address');
        $family->fill($params);

        $success = $family->save();

        if ($success) {
            return response()->json([
                'message' => 'Thêm thông tin gia đình thành công',
            ], 200);
        }
        return response()->json([
            'message' => 'Thêm thông tin gia đình thất bại',
        ], 400);

    }

    public function updateApi(Request $request, $user_id)
    {
        $user = User::where('id', $user_id)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Không tìm thấy người dùng',
            ], 400);
        }

        $family = FamilyManagement::where('user_id', $user_id)->first();

        if (!$family) {
            return response()->json([
                'message' => 'Nguời dùng chưa có thông tin gia đình',
            ], 400);
        }

        try {
            $this->validParam($request);
        } catch (ValidationException $exception) {
            return response()->json(['errors' => $exception->errors()], 400);
        }

        $params = $request->only('relationship', 'name', 'date_of_birth', 'number_phone', 'email', 'sex', 'province_id',
            'district_id', 'ward_id', 'detail_address');
        $family->fill($params);

        $success = $family->save();

        if ($success) {
            return response()->json([
                'message' => 'Cập nhật thông tin gia đình thành công',
            ], 200);
        }

        return response()->json([
            'message' => 'Cập nhật thông tin gia đình thất bại',
        ], 400);
    }

    public function destroyApi($user_id)
    {
        $user = User::where('id', $user_id)->first();

        if (!$user) {
            return response()->json([
                'message' => 'Không tìm thấy người dùng',
            ], 400);
        }

        $family = FamilyManagement::where('user_id', $user_id)->first();

        if (!$family) {
            return response()->json([
                'message' => 'Nguời dùng chưa có thông tin gia đình',
            ], 400);
        }

        $success = $family->delete();

        if ($success) {
            return response()->json([
                'message' => 'Xóa thông tin gia đình thành công',
            ], 200);
        }

        return response()->json([
            'message' => 'Xóa thông tin gia đình thất bại',
        ], 400);
    }

}
