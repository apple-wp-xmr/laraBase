<?php 
namespace App\Models\Traits;

use App\Http\Filters\V1\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

trait HasFilter {
    public function scopeFilter(Builder $builder, AbstractFilter $filter){
        $filter->applyFilters($builder);
        return $builder;
    }

}