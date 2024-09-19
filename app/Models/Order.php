<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $data = ['product_id','amount','total_price'];

    public function product()
    {
        return  $this->belongsTo(Product::class);
    }
}
