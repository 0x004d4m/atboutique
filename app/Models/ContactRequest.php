<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactRequest extends Model
{
    use CrudTrait, HasFactory, SoftDeletes;

    protected $table = 'contact_requests';
    protected $fillable = [
        'email',
        'message',
    ];
}
