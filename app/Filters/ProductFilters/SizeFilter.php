<?php 

namespace App\Filters\ProductFilters;

class SizeFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereHas('sizes', function($q) use($value){
            $q->where('size_id', $value);
        });
    }
}

?>