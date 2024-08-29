<?php

namespace App\Models\Scopes\Vehicle;

use App\Helpers\GeneralScopesHelper;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait VehicleScopeFilters
 *
 * @method static Builder whereTerm(string $term)
 * @method static Builder whereBrand(string $brand)
 */
trait VehicleScopeFilters
{
    public function scopeWhereTerm(Builder $builder, string $term): Builder
    {
        return $builder->where(function (Builder $query) use ($term) {
            $query->where('brand', $term)
                ->orWhere('model', 'like', "%$term%");
        });
    }

    public function scopeWhereBrand(Builder $builder, string $brand): Builder
    {
        return GeneralScopesHelper::filterArrayString($builder, 'brand', $brand);
    }

    public function scopeWhereModel(Builder $builder, string $model): Builder
    {
        return GeneralScopesHelper::filterArrayString($builder, 'model', $model);
    }

    // TODO: Adicionar filtro para '2022/2023'
    public function scopeWhereYear(Builder $builder, string $year): Builder
    {
        return GeneralScopesHelper::filterArrayString($builder, 'year', $year);
    }

    public function scopeWhereVersion(Builder $builder, string $version): Builder
    {
        return GeneralScopesHelper::filterArrayString($builder, 'version', $version);
    }

    public function scopeWhereColor(Builder $builder, string $color): Builder
    {
        return GeneralScopesHelper::filterArrayString($builder, 'color', $color);
    }

    public function scopeWhereMileage(Builder $builder, string $mileage): Builder
    {
        return GeneralScopesHelper::filterArrayString($builder, 'mileage', $mileage);
    }

    public function scopeWhereFuel(Builder $builder, string $fuel): Builder
    {
        return GeneralScopesHelper::filterArrayString($builder, 'fuel', $fuel);
    }
}
