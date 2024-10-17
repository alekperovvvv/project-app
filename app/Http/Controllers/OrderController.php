<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

        $orders = [];
        $ordersData = Order::where('user_id', auth()->id())->get();
        foreach ($ordersData as $order) {
            $result = [];
            $result['id'] = $order->id;
            $result['amount'] = $order->amount;
            $result['status'] = $order->status;
            $productData = Product::where('id', $order->product_id)->first();
            $result['product'] = $productData;
            $orders[] = $result;
        }

        return view('orders.orderlist', compact('orders'));
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'status' => 'required|string',
        ]);

        $order = Order::where('id', $request->id)->first();
        if(!$order) {
            return redirect()->back()->with('warning', 'Заказ не найден');
        }

        $success = true;
        if($request->status === 'одобрен') {
            $productData = Product::where('id', $order->product_id)->first();
            // Товаров заказано больше чем на складе
            if($productData && $productData->amount < $order->amount) {
                $success = false;
            }
        }

        if(!$success) {
            return redirect()->back()->with('warning', 'На складе мало товара');
        }

        if($request->status === 'доставлен' && $order->status === 'новый') {
            return redirect()->back()->with('warning', 'Новый заказ нужно одобрить');
        }

        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Заказ успешно обновлен!');
    }
}
