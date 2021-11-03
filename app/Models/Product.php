<?php

namespace App\Models;

use App\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function image()
    {
        return $this->belongsToMany(Imgs::class, 'product_image', 'product_id', 'image_id')->withTimestamps();
    }

    public function colors()
    {
        return $this->belongsToMany(Colors::class, 'product_colors', 'product_id', 'color_id')->withTimestamps();
    }

    public function sizes()
    {
        return $this->belongsToMany(Sizes::class, 'product_sizes', 'product_id', 'size_id')->withTimestamps();
    }

    public function storages()
    {
        return $this->belongsToMany(Storage::class, 'product_storages', 'product_id', 'storage_id')->withTimestamps();
    }

    //filterMethod
    public function scopeFilter(Builder $builder, $request)
    {
        return (new ProductFilter($request))->filter($builder);
    }

}
