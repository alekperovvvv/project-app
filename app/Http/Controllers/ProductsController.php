<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all(); 
        return view('products', ['products' => $products]); 
    }

    public function order(Request $request) 
    {    
        $request->validate([
            'product_id' => 'required|exists:products,id',        
            'amount' => 'required|integer|min:1',
        ]);   
     
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->amount = $request->amount;
        $order->status = 'новый'; // Устанавливаем статус по умолчанию
        $order->save();
 
        return redirect()->back()->with('success', 'Заказ успешно создан!');
    }

    public function __construct()
    {
        $this->middleware('auth'); 
    }
}
