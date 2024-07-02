<?php

namespace App\Models\Filters;

use Illuminate\Support\Facades\DB;

class ProductFilters extends QueryFilter
{
    public function category_id($value)
    {
        return $this->builder->where('category_id', $value);
    }
    public function search($value)
    {
        return $this->builder->where('name', "LIKE", "%" . $value . "%")->orWhere('description', "LIKE", "%" . $value . "%");
    }
    public function price($value)
    {
        if ($value == 2) {
            return $this->builder->whereBetween('selling_price', [0, 50]);
        }
        if ($value == 3) {
            return $this->builder->whereBetween('selling_price', [50, 100]);
        }
        if ($value == 4) {
            return $this->builder->whereBetween('selling_price', [100, 150]);
        }
        if ($value == 5) {
            return $this->builder->whereBetween('selling_price', [150, 200]);
        }
        if ($value == 6) {
            return $this->builder->where('selling_price', '>', 200);
        }
    }
    public function sort($value)
    {
        if ($value == 1) { // default
            return $this->builder->orderBy('id', 'DESC');
        }
        if ($value == 2) { // popularity
            return $this->builder->leftJoin('carts', 'products.id', '=', 'carts.product_id')
            ->select('products.*', DB::raw('COUNT(carts.id) as popularity'))
            ->groupBy('products.id', 'products.name', 'products.description', 'products.stock', 'products.cost_price', 'products.selling_price', 'products.category_id', 'products.main_image', 'products.created_at', 'products.updated_at', 'products.deleted_at')
            ->orderBy('popularity', 'desc');
        }
        if ($value == 3) { // average_rating
            return $this->builder->leftJoin('carts', 'products.id', '=', 'carts.product_id')
            ->select('products.*', DB::raw('AVG(carts.rate) as average_rating'))
            ->groupBy('products.id', 'products.name', 'products.description', 'products.stock', 'products.cost_price', 'products.selling_price', 'products.category_id', 'products.main_image', 'products.created_at', 'products.updated_at', 'products.deleted_at')
            ->orderBy('average_rating', 'desc');
        }
        if ($value == 4) { // newness
            return $this->builder->orderBy('created_at', 'DESC');
        }
        if ($value == 5) { // price_low_to_high
            return $this->builder->orderBy('selling_price', 'ASC');
        }
        if ($value == 6) { // price_high_to_low
            return $this->builder->orderBy('selling_price', 'DESC');
        }
    }
}
