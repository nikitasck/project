<?php 
namespace App\Filters\ProductFilters;

//Return only choosen
class CategoryFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('category_id', $value);
    }
}

?>