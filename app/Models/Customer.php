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
        'country_id',
        'state_id',
        'zip_code',
        'address',
        'phone',
        'password',
        'verify_token',
        'email_verified',
        'forget_code',
    ];

    public function country()
    {
        return $this->belongsTo(State::class, 'country_id', 'id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
}
