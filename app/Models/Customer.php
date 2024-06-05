<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use CrudTrait, HasFactory, SoftDeletes;

    protected $table = 'customers';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'language_id',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'address',
        'phone',
        'password',
    ];

    public function language()
    {
        return $this->belongsTo(State::class, 'language_id', 'id');
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
}
