<?php

namespace App\Http\Controllers;

use App\Enums\ReviewStoreStatus;
use App\Models\FleaMarket;
use App\Models\ProductInfo;
use App\Models\ReviewStore;
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
        $userId = Auth::user()->id;
        $reviewStore = ReviewStore::where('store_id', $userId)->where('status',ReviewStoreStatus::APPROVED)->get();
        return view('FleaMarket.my-store',compact('reviewStore'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function review()
    {
        return view('FleaMarket.review');
    }
    public function ShopInfo($id)
    {
        $reviewStore = ReviewStore::where('store_id', $id)->where('status',ReviewStoreStatus::APPROVED)->get();
        return view('FleaMarket.shop-infor',compact('id','reviewStore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function sellProduct()
    {
        $user = Auth::user();
        $province = DB::table('provinces')->get();
        return view('FleaMarket.sell-my-product',compact('user','province'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function editProduct($id)
    {
        $e_product = ProductInfo::find($id);
        $provinces = DB::table('provinces')->get();

        return view('FleaMarket.edit-product',compact('e_product','provinces'));
    }
}
