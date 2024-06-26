<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ProductImage extends Model
{
    use CrudTrait, HasFactory, SoftDeletes;

    protected $table = 'product_images';
    protected $fillable = [
        'product_id',
        'image',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $destination_path = "public/uploads";

        if ($value == null) {
            $this->attributes[$attribute_name] = null;
        } else {
            if (Str::startsWith($value, 'data:image')) {
                $image = Image::make($value)->encode('png', 90);
                $filename = md5($value . time()) . '.png';
                Storage::put($destination_path . '/' . $filename, $image->stream());
                $public_destination_path = Str::replaceFirst('public/', 'storage/', $destination_path);
                $this->attributes[$attribute_name] = $public_destination_path . '/' . $filename;
            } else {
                $this->attributes[$attribute_name] = $value;
            }
        }
    }
}
