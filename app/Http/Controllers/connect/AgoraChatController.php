<?php

namespace App\Http\Controllers\connect;

use App\Http\Controllers\Controller;
use App\Models\AgoraChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        ])->orWhere([
            ['user_id_1', $user_id_2],
            ['user_id_2', $user_id_1],
        ])->first();


        if (!$agora_chat) {
           $agora_chat = $this->createMeeting($request);
        }

        return view('video-call.index', compact('agora_chat'));

    }

    function createMeeting(Request $request)
    {
        $user_id_1 = $request->input('user_id_1');
        $user_id_2 = $request->input('user_id_2');

        $appid = '0b47427ee7334417a90ff22c4e537b08';
        $token = '007eJxTYODj0lOf5iBZw7l03pGGTa72CmeuShVsnX1YrlUoY87aec0KDAZJJuYmRuapqebGxiYmhuaJlgZpaUZGySappsbmSQYWTsrnUxsCGRmeGzxgZmRgZGABYhCfCUwyg0kWKJmXkVjCwAAAemUfYA';
        $channel = 'nhat';

        $agora_chat = new AgoraChat();
        $agora_chat->user_id_1 = $user_id_1;
        $agora_chat->user_id_2 = $user_id_2;
        $agora_chat->appid = $appid;
        $agora_chat->token = $token;
        $agora_chat->channel = $channel;
        $agora_chat->save();

        return $agora_chat;
    }

}
