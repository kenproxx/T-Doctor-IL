<?php

namespace App\Http\Controllers\Api;

use App\Enums\MessageStatus;
use App\Events\NewMessage;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function getContactList($id)
    {
        $contacts = User::where('id', '!=', $id)->get();

        $unreadIds = Message::select(DB::raw(' `from` as sender_id, count(`from`) as messages_count'))->where('to',
                $id)->where('read', false)->groupBy('from')->get();
        $contacts = $contacts->map(function ($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;
            return $contact;
        });

        return response()->json($contacts);
    }

    public function getMessages($id, $auth_id)
    {
        Message::where('from', $id)->where('to', $auth_id)->update(['read' => true]);
        Chat::where('from_user_id', $id)->where('to_user_id', $auth_id)->update(['message_status' => MessageStatus::SEEN]);

        $messages = Message::where('from', $id)->orwhere('to', $id)->get();

        return response()->json($messages);
    }

    public function sendNewMessage(Request $request)
    {
        $message = Message::create([
            'from' => $request->sender_id,
            'to' => $request->receiver_id,
            'text' => $request->text
        ]);

        Chat::create([
            'from_user_id' => $request->sender_id,
            'to_user_id' => $request->receiver_id,
            'chat_message' => $request->text,
            'message_status' => MessageStatus::UNSEEN,
        ]);
        broadcast(new NewMessage($message));
        return response()->json($message);
    }
}
