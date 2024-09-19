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

    public function order(Request $request) {    
        $validated = $request->validate([
        'product_id' => 'required|exists:products,id',        
        'amount' => 'required|integer|min:1',
    ]);
    $product = Product::findOrFail($validated['product_id']);    
    $totalPrice = $product->cost * $validated['amount'];
    $order = new Order();
    $order->product_id = $product->id;    
    $order->amount = $validated['amount'];
    $order->total_price = $totalPrice;    
    $order->save();
    return redirect()->back()->with('success', "Заказ успешно оформлен на сумму $totalPrice руб.");
}
}