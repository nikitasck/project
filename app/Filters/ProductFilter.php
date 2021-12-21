<?php 

namespace app\Filters;

use App\Filters\AbstractFilter;
use App\Filters\ProductFilters\ColorFilter;
use App\Filters\ProductFilters\CategoryFilter;
use App\Filters\ProductFilters\ManufactureFilter;
use App\Filters\ProductFilters\StorageFilter;

//Registering filters for Product model
class ProductFilter extends AbstractFilter
{
    protected $filters = [
        //Put here created Classnames::class filters for product
        'colors' => ColorFilter::class,
        'category' => CategoryFilter::class,
        'sizes' => SizeFilter::class,
        'storages' => StorageFilter::class,
        'manufacture' => ManufactureFilter::class
    ];
}

?>