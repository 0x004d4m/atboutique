<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use CrudTrait, HasFactory, SoftDeletes, HasTranslations;

    protected $table = 'states';
    protected $fillable = ['name', 'country_id'];
    protected $translatable = ['name'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
