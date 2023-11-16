<?php

namespace App\Http\Controllers;

use App\Http\Controllers\restapi\CheckoutApi;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('checkout.checkout', compact('carts'));
    }

    public function checkoutByImm(Request $request)
    {
        try {
            $success = (new CheckoutApi())->checkout($request);
            if ($success) {
                alert()->success('Success', 'Checkout success!');
                return redirect(route('home'));
            }
            alert()->error('Error', 'Checkout error!');
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Please try again!');
            return back();
        }
    }
}
