<?php

namespace App\Http\Controllers\backend;

use App\Enums\ProductStatus;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\MedicalFavourite;
use App\Models\ProductInfo;
use App\Models\User;
use App\Models\WishList;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BackendWishListController extends Controller
{
    public function getAll(Request $request)
    {
        $userID = $request->input('user_id');
        $category = $request->input('category');
        $wishLists = DB::table('wish_lists')
            ->join('users', 'users.id', '=', 'wish_lists.user_id')
            ->join('product_infos', 'product_infos.id', '=', 'wish_lists.product_id')
            ->where('wish_lists.user_id', $userID)->where('isFavorite', '=', '1');

        if ($category) {
            $wishLists->where('product_infos.category_id', $category);
        }

        $wishLists->select('wish_lists.*', 'product_infos.*')
            ->get();

        return response()->json($wishLists);
    }

    public function reGet()
    {
        $listWishList = WishList::where('isFavorite', 1);

        if (Auth::check()) {
            $listWishList->where('user_id', Auth::user()->id);
        }

        $listWishList = json_encode($listWishList->pluck('product_id')->toArray());

        return response()->json($listWishList);
    }

    public function findByUserIdAndProductId(Request $request)
    {
        $userID = $request->input('user_id');
        $productID = $request->input('product_id');

        $wishLists = DB::table('wish_lists')->join('users', 'users.id', '=',
            'wish_lists.user_id')->join('product_infos', 'product_infos.id', '=',
            'wish_lists.product_id')->where('wish_lists.user_id', $userID)->where('wish_lists.product_id',
            $productID)->where('product_infos.status', ProductStatus::ACTIVE)->select('wish_lists.*')->get();

        return response()->json($wishLists);
    }

    public function create(Request $request)
    {
        try {
            $userID = $request->input('user_id');
            $productID = $request->input('product_id');

            if (!$userID || !$productID) {
                return response('UserID or ProductID not found', 404);
            }

            $user = User::find($userID);
            if (!$user || $user->status != UserStatus::ACTIVE) {
                return response('User not found', 404);
            }

            $product = ProductInfo::find($productID);
            if (!$product || $product->status != ProductStatus::ACTIVE) {
                return response('Product not found', 404);
            }

            $wishList = new WishList();
            $wishList->user_id = $userID;
            $wishList->product_id = $productID;

            $success = $wishList->save();
            if ($success) {
                return response()->json($wishList);
            }
            return response('Adding favorite products encountered an error', 400);
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }

    public function detail($id)
    {
        $wishList = WishList::find($id);
        if ($wishList) {
            return response()->json($wishList);
        }
        return response('Not found', 404);
    }

    public function update(Request $request, $id)
    {
        try {
            $wishList = WishList::where('product_id', $id)->first();
            $userID = $request->input('user_id');
            $productID = $request->input('product_id');
            if ($wishList) {
                $isFavorite = $wishList->isFavorite;
                $wishList->user_id = $userID;
                $wishList->product_id = $productID;
                $wishList->isFavorite = !$isFavorite;

                $success = $wishList->save();
                if ($success) {
                    return response()->json($wishList);
                }
                return response('Update error', 400);
            } else {
                $wishList = new WishList();
                $wishList->user_id = $userID;
                $wishList->product_id = $productID;
                $wishList->isFavorite = '1';

                $success = $wishList->save();
                if ($success) {
                    return response()->json($wishList);
                }
                return response('Update error', 400);
            }
        } catch (Exception $exception) {
            return response($exception, 400);
        }

    }

    public function updateMedical(Request $request, $id)
    {
        try {
            $wishList = MedicalFavourite::where('medical_id', $id)->first();
            $userID = $request->input('user_id');
            $productID = $request->input('product_id');
            if ($wishList) {
                $isFavorite = $wishList->is_favorite;
                $wishList->user_id = $userID;
                $wishList->medical_id = $productID;
                $wishList->is_favorite = !$isFavorite;

                $success = $wishList->save();
                if ($success) {
                    return response()->json($wishList);
                }
                return response('Update error', 400);
            } else {
                $wishList = new MedicalFavourite();
                $wishList->user_id = $userID;
                $wishList->medical_id = $productID;
                $wishList->is_favorite = '1';

                $success = $wishList->save();
                if ($success) {
                    return response()->json($wishList);
                }
                return response('Update error', 400);
            }
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }

    public function deleteMultil(Request $request)
    {
        $listID = $request->input('listID');
        $listID = explode(',', $listID);
        try {
            $success = WishList::whereIn('id', $listID)->delete();
            if ($success) {
                return response('Delete success', 200);
            }
            return response('Delete error', 400);
        } catch (Exception $exception) {
            return response($exception, 400);
        }
    }

    public function delete($id)
    {
        $wishList = WishList::find($id);
        if ($wishList) {
            $success = WishList::where('id', $id)->delete();
            if ($success) {
                return response('Delete success', 200);
            }
            return response('Delete error', 400);
        }
        return response('Not found', 404);
    }
}
