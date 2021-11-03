<?php 

namespace App\Filters\ProductFilters;

use Illuminate\Database\Eloquent\Builder;

//Return only choosen
class ColorFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereHas('colors', function($q) use($value){
            $q->where('color_id', $value);
        });
    }
}

?>