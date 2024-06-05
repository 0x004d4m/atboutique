<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use CrudTrait, HasFactory, SoftDeletes;

    protected $table = 'orders';
    protected $fillable = [
        'customer_id',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'address',
        'shipping_company_id',
        'order_status_id',
        'coupon_id',
        'total_cost_price',
        'total_selling_price',
    ];

    public function customer()
    {
        return $this->belongsTo(State::class, 'customer_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(State::class, 'country_id', 'id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(State::class, 'city_id', 'id');
    }

    public function shippingCompany()
    {
        return $this->belongsTo(State::class, 'shipping_company_id', 'id');
    }

    public function orderStatus()
    {
        return $this->belongsTo(State::class, 'order_status_id', 'id');
    }

    public function coupon()
    {
        return $this->belongsTo(State::class, 'coupon_id', 'id');
    }

    public function cartItems()
    {
        return $this->hasMany(Cart::class, 'order_id', 'id');
    }
}
