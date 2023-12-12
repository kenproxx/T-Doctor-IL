<?php

namespace App\Http\Controllers\connect;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;

class WidgetChatController extends Controller
{
    public function getListUserWasConnect()
    {
        // lấy danh sách user đã kết nối với user hiện tại qua bảng chat
        $currentUserId = auth()->user()->id;
        $listUserWasConnect = Chat::where(function ($query) use ($currentUserId) {
            $query->where('from_user_id', $currentUserId)->orWhere('to_user_id', $currentUserId);
        })->pluck('from_user_id', 'to_user_id')->toArray();


        $uniqueUserIds = array_unique(array_merge(array_keys($listUserWasConnect), array_values($listUserWasConnect)));

        $uniqueUserIds = array_diff($uniqueUserIds, [$currentUserId]);

        $userInfoArray = [];

        // Vòng lặp qua mỗi user_id trong mảng filteredUserIds
        foreach ($uniqueUserIds as $userId) {
            // Gọi hàm getNameByID để lấy tên theo id
            $userName = User::getNameByID($userId);

            // get email
            $userEmail = User::getEmailByID($userId);

            // get avt
            $userAvt = User::getAvtByID($userId);

            // Thêm thông tin (id & name) vào mảng userInfoArray
            $userInfoArray[] = ['id' => $userId, 'name' => $userName, 'email' => $userEmail, 'avt' => $userAvt];
        }

        return response()->json($userInfoArray);
    }

    public function getMessageByUserId($id)
    {
        // lấy danh sách user đã kết nối với user hiện tại qua bảng chat
        $currentUserId = auth()->user()->id;
        $listMessageByUser = Chat::where(function ($query) use ($currentUserId, $id) {
            $query->where([['from_user_id', $currentUserId], ['to_user_id', $id]])
            ->orWhere([['from_user_id', $id], ['to_user_id', $currentUserId]]);
        })->get();

        return response()->json($listMessageByUser);
    }
}
