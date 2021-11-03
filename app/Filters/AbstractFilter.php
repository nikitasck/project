<?php 

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;



abstract class AbstractFilter
{
    protected $request;
    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function filter(Builder $builder)
    {
        foreach($this->getFilters() as $filter => $value){
            $this->resolveFilters($filter)->filter($builder, $value);
        }

        return $builder;
    }

    //Get only filters names from request.
    public function getFilters()
    {
        return array_filter($this->request->only(array_keys($this->filters)));
    }

    public function resolveFilters($filter)
    {
        return new $this->filters[$filter];
    }
}
?>