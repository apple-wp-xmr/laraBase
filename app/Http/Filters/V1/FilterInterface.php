<?php

namespace App\Http\Filters\V1;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface {
    public function applyFilters(Builder $builder);
}