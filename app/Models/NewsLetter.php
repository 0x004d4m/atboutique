<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsLetter extends Model
{
    use CrudTrait, HasFactory, SoftDeletes;

    protected $table = 'news_letters';
    protected $fillable = ['email'];
}
