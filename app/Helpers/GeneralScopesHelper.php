<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;

class GeneralScopesHelper
{
    public static function whereLike(Builder $builder, string $column, string $value): Builder
    {
        return $builder->where($column, 'like', "%$value%");
    }
}
