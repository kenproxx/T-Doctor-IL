<?php

namespace App\Http\Controllers;

use App\Enums\ProductStatus;
use App\Enums\ReviewStoreStatus;
use App\Models\Category;
use App\Models\FleaMarket;
use App\Models\online_medicine\CategoryProduct;
use App\Models\ProductInfo;
use App\Models\ReviewStore;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FleaMarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = CategoryProduct::where('status', 1)->get();
        $listWishList = WishList::where('isFavorite', 1);

        if (Auth::check()) {
            $listWishList->where('user_id', Auth::user()->id);
        }

        $listWishList = json_encode($listWishList->pluck('product_id')->toArray());

        return view('FleaMarket.flea-market', compact('listWishList', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function productDetail($id)
    {
        return view('FleaMarket.product_details', compact('id'));
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
        $reviewStore = ReviewStore::where('store_id', $userId)->where('status', ReviewStoreStatus::APPROVED)->get();
        $id = Auth::user()->id;
        return view('FleaMarket.my-store', compact('reviewStore', 'id'));
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
        $reviewStore = ReviewStore::where('store_id', $id)->where('status', ReviewStoreStatus::APPROVED)->get();
        return view('FleaMarket.shop-infor', compact('id', 'reviewStore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function sellProduct()
    {
        $user = Auth::user();
        $province = DB::table('provinces')->get();
        $category = CategoryProduct::where('status', 1)->get();
        return view('FleaMarket.sell-my-product', compact('user', 'province', 'category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function editProduct($id)
    {
        $e_product = ProductInfo::find($id);
        $provinces = DB::table('provinces')->get();
        $departments = CategoryProduct::where('status', 1)->get();
        return view('FleaMarket.edit-product', compact('e_product', 'provinces', 'departments'));
    }
}
