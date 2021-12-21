<?php 

namespace App\Filters\ProductFilters;

class ManufactureFilter
{
    public function filter($builder, $value) 
    {
        return $builder->where('manufacture', $value);
    }
}

?>