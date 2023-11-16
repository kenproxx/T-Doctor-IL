<?php

namespace App\Http\Controllers\restapi;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartApi extends Controller
{
    public function showCartByUserID($id)
    {
        $carts = Cart::where('user_id', $id)->get();
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
                return response('Success!', 200);
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
