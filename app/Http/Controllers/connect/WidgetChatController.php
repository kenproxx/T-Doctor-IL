<?php

namespace App\Http\Controllers\connect;

use App\Enums\MessageStatus;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        $totalUnreadMessage = Chat::where([
            ['to_user_id', '=', Auth::id()],
            ['message_status', '=', MessageStatus::UNSEEN]
        ])->count();

        // Vòng lặp qua mỗi user_id trong mảng filteredUserIds
        foreach ($uniqueUserIds as $userId) {
            // Gọi hàm getNameByID để lấy tên theo id
            $userName = User::getNameByID($userId);

            $countUnreadMessage = Chat::where([
                ['from_user_id', '=', $userId],
                ['to_user_id', '=', Auth::id()],
                ['message_status', '=', MessageStatus::UNSEEN]
            ])->count();

            // get email
            $userEmail = User::getEmailByID($userId);

            // get avt
            $userAvt = User::getAvtByID($userId);

            // Thêm thông tin (id & name) vào mảng userInfoArray
            $userInfoArray[] = [
                'id' => $userId,
                'name' => $userName,
                'email' => $userEmail,
                'avt' => $userAvt,
                'count_unread_message' => $countUnreadMessage,
                'total_unread_message' => $totalUnreadMessage
            ];
        }

        //lấy tổng các tin nhắn chưa đọc gửi tới user hiện tại


        return response()->json($userInfoArray);
    }

    public function getMessageByUserId($id)
    {
        // lấy danh sách user đã kết nối với user hiện tại qua bảng chat
        $currentUserId = auth()->user()->id;
        $listMessageByUser = Chat::where(function ($query) use ($currentUserId, $id) {
            $query->where([['from_user_id', $currentUserId], ['to_user_id', $id]])->orWhere([
                ['from_user_id', $id],
                ['to_user_id', $currentUserId]
            ]);
        })->get();

        return response()->json($listMessageByUser);
    }

    public function handleSeenMessage($id)
    {
        if (!$id) {
            return;
        }

        Message::where([['from', '=', $id], ['to', '=', Auth::id()]])->update(['read' => true]);
        Chat::where([
            ['from_user_id', '=', $id],
            ['to_user_id', '=', Auth::id()]
        ])->update(['message_status' => MessageStatus::SEEN]);
    }
}
