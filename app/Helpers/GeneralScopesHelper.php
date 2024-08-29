<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class GeneralScopesHelper
{
    public static function filterArrayString(Builder $query, string $column, string $values): Builder
    {
        return $query->where($column, explode('|', $values));
    }

    private function filterByDate(Builder $builder, string $date, string $column): Builder
    {
        if (str_contains($date, '|')) {
            $dates = explode('|', $date);

            $startDate = Carbon::parse($dates[0])->startOfDay();
            $endDate = Carbon::parse($dates[1])->endOfDay();

            return $builder->whereBetween($column, [$startDate, $endDate]);
        }

        return $builder->whereDate($column, $date);
    }
}
