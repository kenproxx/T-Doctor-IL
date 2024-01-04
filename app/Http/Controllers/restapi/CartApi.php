<?php

namespace App\Http\Controllers\restapi;

use App\Enums\TypeProductCart;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\online_medicine\ProductMedicine;
use App\Models\ProductInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartApi extends Controller
{
    public function showCartByUserID($id)
    {
        $carts = DB::table('carts')
            ->where('user_id', $id)
            ->cursor()
            ->map(function ($item) {
                if ($item->type_product == TypeProductCart::MEDICINE) {
                    $products = ProductMedicine::find($item->product_id);
                } else {
                    $products = ProductInfo::find($item->product_id);
                }
                $cart['products'] = $products->toArray();
                return $cart;
            });
        return response()->json($carts);
    }

    public function addToCart(Request $request)
    {
        $userID = $request->input('user_id');

        $productID = $request->input('product_id');
        $typeProduct = $request->input('type_product');

        $quantity = $request->input('quantity');

        try {
            $cart = Cart::where('user_id', $userID)
                ->where('product_id', $productID)
                ->where('type_product', $typeProduct)
                ->first();
            if ($cart) {
                $cart->quantity = $cart->quantity + $quantity;
            } else {
                $cart = new Cart();
                $cart->product_id = $productID;
                $cart->quantity = $quantity;
                $cart->user_id = $userID;
                $cart->type_product = $typeProduct;
            }

            $success = $cart->save();
            if ($success) {
                return response()->json($cart);
            }
            return response('Error, Please try again!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function changeQuantityCart(Request $request, $id)
    {
        try {
            $cart = Cart::where('id', $id)->first();
            $quantity = $request->input('quantity');
            $cart->quantity = $quantity;
            $success = $cart->save();
            if ($success) {
                return response((new MainApi())->returnMessage('Update success!'), 200);
            }
            return response('Error, Please try again!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function deleteCart($id)
    {
        try {
            $success = Cart::where('id', $id)->delete();
            if ($success) {
                return response('Success!', 200);
            }
            return response('Error, Please try again!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function clearCart($id)
    {
        try {
            $success = Cart::where('user_id', $id)->delete();
            if ($success) {
                return response('Success!', 200);
            }
            return response('Error, Please try again!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }
}
