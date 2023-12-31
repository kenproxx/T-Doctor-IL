<?php

namespace App\Http\Controllers\restapi;

use App\Enums\OrderItemStatus;
use App\Enums\OrderStatus;
use App\Enums\TypeProductCart;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\Cart;
use App\Models\online_medicine\ProductMedicine;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductInfo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutApi extends Controller
{
    public function checkoutByImm(Request $request)
    {
        try {
            $success = $this->checkout($request);
            if ($success) {
                return response('Checkout success!', 200);
            }
            return response('Checkout error!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function checkout($request)
    {
        $userID = $request->input('user_id');

        $full_name = $request->input('full_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address_checkout');


        $total = $request->input('total_fee');
        $ship = $request->input('shipping_fee');
        $discount = $request->input('discount_fee');
        $totalOrder = $request->input('total_order');

        $orderMethod = $request->input('order_method');

        $order = new Order();

        $order->user_id = $userID;

        $order->full_name = $full_name;
        $order->email = $email;
        $order->phone = $phone;
        $order->address = $address;

        $order->total_price = $total;
        $order->shipping_price = $ship;
        $order->discount_price = $discount;
        $order->total = $totalOrder;

        $order->order_method = $orderMethod;
        $order->status = OrderStatus::PROCESSING;

        $success = $order->save();

        $carts = Cart::where('user_id', $userID)->get();
        foreach ($carts as $cart) {
            if ($cart->type_product == TypeProductCart::MEDICINE) {
                $product = ProductMedicine::find($cart->product_id);
            } else {
                $product = ProductInfo::find($cart->product_id);
            }

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;

            $orderItem->product_id = $cart->product_id;
            $orderItem->quantity = $cart->quantity;
            $orderItem->price = $product->price;
            $orderItem->type_product = $cart->type_product;

            $orderItem->status = OrderItemStatus::ACTIVE;

            $orderItem->save();

            $cart->delete();
        }

        $roleAdmin = Role::where('name', \App\Enums\Role::ADMIN)->first();
        $role_user = DB::table('role_users')->where('role_id', $roleAdmin->id)->first();
        $admin = User::where('id', $role_user->user_id)->first();
        (new MailController())->sendEmail($email, 'support_krmedi@gmail.com', 'Order success', 'Notification of successful order placement!');
        (new MailController())->sendEmail($admin->email, 'support_krmedi@gmail.com', 'Order created', 'A new order has just been created!');

        return $success;
    }

    public function returnCheckoutVNPay(Request $request)
    {
        try {
            $response = null;
            $vnp_ResponseCode = $request->input('vnp_ResponseCode');
            $response['vnp_ResponseCode'] = $vnp_ResponseCode;
            return response()->json($response);
        } catch (\Exception $exception) {
            return response((new MainApi())->returnMessage('Error, Please try again!'), 400);
        }
    }
}
