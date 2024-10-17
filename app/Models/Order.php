<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'amount', 'status'];
    public function product()
    {
        return  $this->belongsTo(Product::class);
    }

    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            $order->user_id = auth()->id();
        });
    }
}
