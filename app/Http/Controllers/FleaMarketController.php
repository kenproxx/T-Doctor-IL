<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FleaMarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('FleaMarket.flea-market');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function productDetail()
    {
        return view('FleaMarket.product_details');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function wishList()
    {
        return view('FleaMarket.wish-list');
    }

    /**
     * Display the specified resource.
     */
    public function myStore()
    {
        return view('FleaMarket.my-store');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function review()
    {
        return view('FleaMarket.review');
    }

    /**
     * Update the specified resource in storage.
     */
    public function sellProduct()
    {
        return view('FleaMarket.sell-my-product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
