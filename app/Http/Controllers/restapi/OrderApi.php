<?php

namespace App\Http\Controllers\restapi;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderApi extends Controller
{
    public function getAllByUser($id, Request $request)
    {
        $status = $request->input('status');
        if ($status) {
            $orders = Order::where('user_id', $id)
                ->where('status', $status)
                ->orderBy('id', 'desc')
                ->get();
        } else {
            $orders = Order::where('user_id', $id)
                ->where('status', '!=', OrderStatus::DELETED)
                ->orderBy('id', 'desc')
                ->get();
        }

        return response()->json($orders);
    }

    public function detail($id)
    {
        $order = Order::find($id);
        if (!$order || $order->status == OrderStatus::DELETED) {
            return response('Not found', 404);
        }
        return response()->json($order);
    }

    /* Only cancel order when status of order is Processing or */
    public function cancelOrder($id, Request $request)
    {
        try {
            $order = Order::find($id);
            if ($order->status == OrderStatus::PROCESSING) {
                $order->status = OrderStatus::CANCELED;
                $success = $order->save();
                if ($success) {
                    return response('Cancel order success!', 200);
                }
                return response('Cancel order error!', 400);
            }
            return response('Error, Please try again!', 400);
        } catch (\Exception $exception) {
            return response($exception, 400);
        }
    }

    public function deleteOrder($id, Request $request)
    {

    }
}
