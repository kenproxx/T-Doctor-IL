<?php

namespace App\Http\Controllers;

use App\Models\FleaMarket;
use App\Models\ProductInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FleaMarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productFleaMarkets = DB::table('product_infos')->get();

        return view('FleaMarket.flea-market',compact('productFleaMarkets'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function productDetail($id)
    {
        return view('FleaMarket.product_details',compact('id'));
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
        $user = Auth::user();

        return view('FleaMarket.sell-my-product',compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function editProduct()
    {
        return view('FleaMarket.edit-product');
    }
}
