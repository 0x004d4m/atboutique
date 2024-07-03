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

        // Get the existing images from the database
        $existingImages = $this->attributes[$attribute_name] ? json_decode($this->attributes[$attribute_name], true) : [];

        // Handle cleared images
        $clearedImages = request()->input('clear_' . $attribute_name, []);
        $existingImages = array_diff($existingImages, $clearedImages);

        // If the value is an array, it means there are new files to upload
        if (is_array($value)) {
            $newImages = [];
            foreach ($value as $file) {
                // Check if the file is a valid upload
                if (is_a($file, 'Illuminate\Http\UploadedFile')) {
                    // Store the file and get its path
                    $filename = $file->store($destination_path, $disk);
                    $newImages[] = $filename;
                } else {
                    // Add the existing file paths that are not cleared
                    $newImages[] = $file;
                }
            }
            // Merge new images with the remaining existing images
            $allImages = array_merge($existingImages, $newImages);
        } else {
            // If no new files were uploaded, just use the existing images
            $allImages = $existingImages;
        }

        // Save the images array as JSON in the database
        $this->attributes[$attribute_name] = json_encode($allImages);
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
