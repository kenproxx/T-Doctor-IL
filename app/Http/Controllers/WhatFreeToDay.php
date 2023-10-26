<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatFreeToDay extends Controller
{
    public function index()
    {
        return view('What-free.what-free');
    }

    public function toDay()
    {
        return view('What-free.tab-free-today');
    }
    public function withMission()
    {
        return view('What-free.tab-with-mission');
    }
    public function discountedSevice()
    {
        return view('What-free.tab-discounted-sevice');
    }

    public function detail()
    {
        return view('What-free.detail-what-free');
    }
    public function campaign()
    {
        return view('What-free.my-campaign');
    }
}
