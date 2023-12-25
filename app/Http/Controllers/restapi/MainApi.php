<?php

namespace App\Http\Controllers\restapi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainApi extends Controller
{
    public function returnMessage($message)
    {
        return ['message' => $message];
    }
}
