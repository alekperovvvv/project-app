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
    
        $order = new Order();
        
        $order->product_id = $validated['product_id'];
        $order->amount = $validated['amount'];
        
        $order->save();
    }
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function create(Request $request)
    {

    }
}

