<?php

namespace App\Http\Controllers\backend;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BackendStaffController extends Controller
{
    public function index()
    {
        $user = '';
        return response()->json($user);
    }

    public function store(Request $request)
    {
        try {
            $username = $request->input('username');
            $member = $request->input('member');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $password = $request->input('password');
            $password_confirm = $request->input('password_confirm');
            $manager_id = $request->input('manager_id');

            //check username không được trống
            if (!$username) {
                return response('Username không được trống', 400);
            }
            //check email không được trống
            if (!$email) {
                return response('Email không được trống', 400);
            }
            //check regex email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return response('Email không đúng định dạng', 400);
            }
            //check password không được trống
            if (!$password) {
                return response('Password không được trống', 400);
            }
            //check password_confirm không được trống
            if (!$password_confirm) {
                return response('Password_confirm không được trống', 400);
            }
            $isExistUsername = User::isExistUsername($username);
            if ($isExistUsername) {
                return response('Username đã tồn tai', 400);
            }
            $isExistEmail = User::isExistEmail($email);
            if ($isExistEmail) {
                return response('Email đã tồn tại', 400);
            }

            $isExistPhone = User::isExistPhone($phone);
            if ($isExistPhone) {
                return response('Phone đã tồn tại', 400);
            }

            if (strlen($password) < 8) {
                return response('Password phải có ít nhất 8 ký tự', 400);
            }
            if ($password != $password_confirm) {
                return response('Password không trùng khớp', 400);
            }

            $user = new User();
            $user->username = $username;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->manager_id = $manager_id;
            $user->type = $member;
            $user->status = UserStatus::ACTIVE;

            $user->name = '';
            $user->last_name = '';
            $user->phone = $phone;
            $user->address_code = '';

            $success = $user->save();

            if ($success) {
                $role = Role::where('name', $member)->first();

                if ($role) {
                    // Lấy id của user vừa tạo
                    $newUser = User::where('username', $username)->first();

                    // Tạo mới bản ghi trong bảng role_user
                    RoleUser::create([
                        'role_id' => $role->id,
                        'user_id' => $newUser->id
                    ]);
                } else {
                    // Xử lý nếu không tìm thấy role
                    // (ví dụ: thông báo lỗi hoặc xử lý khác)
                }
                return response()->json($user);
            }

            return response('Create error', 400);
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }

    public function show($id)
    {
        $user = '';
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        try {
            $username = $request->input('username');
            $member = $request->input('member');
            $email = $request->input('email');
            $password = $request->input('password');
            $password_confirm = $request->input('password_confirm');
            $status = $request->input('status');

            //check username không được trống
            if (!$username) {
                return response('Username không được trống', 400);
            }
            //check email không được trống
            if (!$email) {
                return response('Email không được trống', 400);
            }
            //check regex email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return response('Email không đúng định dạng', 400);
            }
            //check password không được trống
            if ($password) {
                if (strlen($password) < 8) {
                    return response('Password phải có ít nhất 8 ký tự', 400);
                }
                if ($password != $password_confirm) {
                    return response('Password không trùng khớp', 400);
                }
                if (!$password_confirm) {
                    return response('Password_confirm không được trống', 400);
                }
            }
            //check username xem có trùng với username của user id hiện tại không
            $isExistUsername = User::where('username', $username)->where('id', '!=', $id)->first();
            if ($isExistUsername) {
                return response('Username đã tồn tai', 400);
            }
            //check email xem có trùng với email của user id hiện tại không
            $isExistEmail = User::where('email', $email)->where('id', '!=', $id)->first();
            if ($isExistEmail) {
                return response('Email đã tồn tại', 400);
            }

            $user = User::find($id);
            if (!$user) {
                return response('User not found', 404);
            }
            $user->username = $username;
            $user->email = $email;
            if ($password) {
                $user->password = Hash::make($password);
            }
            $user->type = $member;
            $user->status = $status;


            $success = $user->save();

            if ($success) {
                $role = Role::where('name', $member)->first();

                if ($role) {

                    // cập nhật bản ghi trong bảng role_user
                    RoleUser::where('user_id', $user->id)->update([
                        'role_id' => $role->id,
                    ]);

                }
                return response()->json($user);
            }
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }

    public function destroy($id)
    {
        try {
            //change status user to deleted
            $user = User::find($id);
            if (!$user) {
                return response('User not found', 404);
            }
            $user->status = UserStatus::DELETED;
            $user->save();
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }
}
