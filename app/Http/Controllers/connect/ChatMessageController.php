<?php

namespace App\Http\Controllers\connect;

use App\Http\Controllers\Controller;

class ChatMessageController extends Controller
{
    public function index()
    {
        return view('admin.connect.chat.index');
    }
}
