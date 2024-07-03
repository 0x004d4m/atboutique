<?php

namespace App\Models;

use App\Models\Filters\ProductFilters;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Backpack\CRUD\app\Models\Traits\SpatieTranslatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
        'images',
    ];
    protected $translatable = [
        'name',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function setImagesAttribute($value)
    {
        $attribute_name = "images";
        $disk = "public"; // Use your desired disk
        $destination_path = "uploads/images"; // Your destination path

        // If the images were erased
        if ($value == null) {
            Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
        }

        // If a file was uploaded
        if (is_array($value)) {
            if(count($value)==0){
                $this->attributes[$attribute_name] = null;
            }
            $images = [];
            foreach ($value as $file) {
                $filename = $file->store($destination_path, $disk);
                $images[] = $filename;
            }
            $this->attributes[$attribute_name] = json_encode($images);
        }
    }

    // public function getImagesAttribute($value)
    // {
    //     return json_decode($value);
    // }

    public function scopeFilter($query, ProductFilters $filters)
    {
        return $filters->apply($query);
    }
}
