<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Проверка, является ли пользователь администратором
        if (Auth::check() && Auth::user()->role === 'admin') {
            $orders = [];
            $ordersData = Order::all();
            foreach ($ordersData as $order) {
                $result = [];
                $result['id'] = $order->id;
                $result['amount'] = $order->amount;
                $result['status'] = $order->status;
                $productData = Product::where('id', $order->product_id)->first();
                $result['product'] = $productData->name;
                $result['date'] = $order->created_at->format('d.m.Y H:i:s');
                $userData = User::where('id', $order->user_id)->first();
                $result['email'] = $userData->email;
                $orders[] = $result;
            }

            return view('admin/admin', compact('orders')); // создайте представление admin/index.blade.php
        }

        return redirect('/'); // или на другую страницу, если доступ запрещен
    }
}
