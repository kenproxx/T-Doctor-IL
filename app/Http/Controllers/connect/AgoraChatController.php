<?php

namespace App\Http\Controllers\connect;

use App\Http\Controllers\Controller;
use App\Models\AgoraChat;
use App\Models\User;
use Illuminate\Http\Request;
use Pusher\Pusher;

class AgoraChatController extends Controller
{
    function index()
    {
        return view('video-call.index');
    }

    function handleCallVideo(Request $request)
    {
        $user_id_1 = $request->input('user_id_1');
        $user_id_2 = $request->input('user_id_2');

        // find agorachat by user_id_1 =  user_id_1 or user_id_2 and user_id_2 = user_id_2 or user_id_1
        $agora_chat = AgoraChat::where([
            ['user_id_1', $user_id_1],
            ['user_id_2', $user_id_2],
        ])->first();


        if (!$agora_chat) {
            $agora_chat = $this->createMeeting($request);
        }

        $data['content'] = route('agora.joinMeeting', ['user_id_1' => $user_id_2, 'user_id_2' => $user_id_1]);
        $data['user_id_1'] = $user_id_2;
        $data['user_id_2'] = $user_id_1;

        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );

        $PUSHER_APP_KEY = '3ac4f810445d089829e8';
        $PUSHER_APP_SECRET = 'c6cafb046a45494f80b2';
        $PUSHER_APP_ID = '1714303';

        $pusher = new Pusher($PUSHER_APP_KEY, $PUSHER_APP_SECRET, $PUSHER_APP_ID, $options);

        $pusher->trigger('send-message', 'send-message', $data);

        return view('video-call.index', compact('agora_chat'));

    }

    function createMeeting(Request $request)
    {
        $user_id_1 = $request->input('user_id_1');
        $user_id_2 = $request->input('user_id_2');

        $appid = '0b47427ee7334417a90ff22c4e537b08';
        $token = '007eJxTYPB/Vr3nSccEvubr2vmab14b30lz6a3gzmI6XpbzOPGYmJoCg0GSibmJkXlqqrmxsYmJoXmipUFampFRskmqqbF5koFF5I1LqQ2BjAyzOeIZGIGQBYhBfCYwyQwmWaBkXkZiCQMDAHdAIUI=';
        $channel = 'nhat';

        $agora_chat = new AgoraChat();
        $agora_chat->user_id_1 = $user_id_1;
        $agora_chat->user_id_2 = $user_id_2;
        $agora_chat->appid = $appid;
        $agora_chat->uid = $this->stripVN(User::getNameByID($user_id_1) ?? 'Default Name');
        $agora_chat->token = $token;
        $agora_chat->channel = $channel;

        $agora_chat->save();

        return $agora_chat;
    }

    function stripVN($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);

        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        return $str;
    }

    function saveTokenByUserId(Request $request)
    {
        $user_id_1 = $request->input('user_id_1');
        $user_id_2 = $request->input('user_id_2');
        $token = $request->input('token');

        $agora_chat = AgoraChat::where([
            ['user_id_1', $user_id_1],
            ['user_id_2', $user_id_2],
        ])->first();

        $agora_chat->token = $token;
        $agora_chat->save();

        return $agora_chat;
    }

    function joinMeeting(Request $request)
    {
        $user_id_1 = $request->input('user_id_1');
        $user_id_2 = $request->input('user_id_2');

        $agora_chat = AgoraChat::where([
            ['user_id_1', $user_id_1],
            ['user_id_2', $user_id_2],
        ])->first();

        if (!$agora_chat) {
            $agora_chat = $this->createMeeting($request);
        }

        return view('video-call.index', compact('agora_chat'));

    }

}
