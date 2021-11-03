<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_colors', 'product_id', 'color_id')->withTimestamps();
    }

}
