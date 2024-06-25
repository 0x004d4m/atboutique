<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'carts';
    protected $fillable = [
        'quantity',
        'single_product_cost_price',
        'total_product_cost_price',
        'single_product_selling_price',
        'total_product_selling_price',
        'session_id',
        'customer_id',
        'product_id',
        'size_id',
        'color_id',
        'order_id',
        'rate',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
