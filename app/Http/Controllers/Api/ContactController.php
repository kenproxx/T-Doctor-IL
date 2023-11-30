<?php

namespace App\Http\Controllers\Api;

use App\Enums\MessageStatus;
use App\Events\NewMessage;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function getContactList($id)
    {
        $contacts = User::where('id', '!=', $id)->get();

       $unreadIds = Chat::select(DB::raw(' `from` as sender_id, count(`from`) as messages_count'))
       ->where('to', $id)
       ->where('read', MessageStatus::UNSEEN)
       ->groupBy('from')
       ->get();
       $contacts = $contacts->map(function($contact) use ($unreadIds) {
        $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
        $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;
        return $contact;
       });

       return response()->json($contacts);
    }
    public function getMessages($id, $auth_id)
    {
        Chat::where('from',$id)->where('to', $auth_id)->update(['read'=>MessageStatus::SEEN]);

        $messages = Chat::where('from',$id)->orwhere('to', $id)->get();

        return response()->json($messages);
    }
    public function sendNewMessage(Request $request)
    {
       $message = Chat::create([
            'from' => $request->sender_id,
            'to' => $request->receiver_id,
            'text' => $request->text
        ]);

        broadcast(new NewMessage($message));
        return response()->json($message);
    }
}
