<?php 

namespace App\Filters\ProductFilters;

use Illuminate\Database\Eloquent\Builder;

class StorageFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereHas('storages', function ($q) use($value){
            $q->where('storage_id', $value);
        });
    }
}

?>
