<?php

namespace App\Models;

use App\Models\Filters\ProductFilters;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use CrudTrait, HasFactory, SoftDeletes, HasTranslations;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'stock',
        'cost_price',
        'selling_price',
        'category_id',
        'main_image',
    ];
    protected $translatable = [
        'name',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function setMainImageAttribute($value)
    {
        $attribute_name = "main_image";
        $destination_path = "public/uploads";

        if ($value == null) {
            $this->attributes[$attribute_name] = null;
        }else{
            if (Str::startsWith($value, 'data:image')) {
                $image = Image::make($value)->encode('png', 90);
                $filename = md5($value . time()) . '.png';
                Storage::put($destination_path . '/' . $filename, $image->stream());
                $public_destination_path = Str::replaceFirst('public/', 'storage/', $destination_path);
                $this->attributes[$attribute_name] = $public_destination_path . '/' . $filename;
            }else{
                $this->attributes[$attribute_name] = $value;
            }
        }
    }

    public function scopeFilter($query, ProductFilters $filters)
    {
        return $filters->apply($query);
    }
}
