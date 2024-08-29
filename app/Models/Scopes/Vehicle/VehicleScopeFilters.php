<?php

namespace App\Models\Scopes\Vehicle;

use App\Enums\ColorEnum;
use App\Enums\FuelEnum;
use App\Enums\TransmissionEnum;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait VehicleScopeFilters
 *
 * @method static Builder whereTerm(string $term)
 * @method static Builder whereBrand(string $brand)
 * @method static Builder whereYear(string $startYear, string $endYear)
 * @method static Builder wherePrice(string $startPrice, string $endPrice)
 * @method static Builder whereMileage(string $startMileage, string $endMileage)
 * @method static Builder whereTransmission(TransmissionEnum $transmissionEnum)
 * @method static Builder whereFuel(FuelEnum $fuel)
 * @method static Builder whereColor(ColorEnum $color)
 * @method static Builder whereDoors(int $doors)
 * @method static Builder whereDate(string $date)
 */
trait VehicleScopeFilters
{
    public function scopeWhereTerm(Builder $builder, string $term): Builder
    {
        return $builder->where(
            fn (Builder $query) => $query->whereLike('brand', $term)
                ->orWhereLike('model', $term)
        );
    }

    public function scopeWhereSupplier(Builder $builder, int $supplierId): Builder
    {
        return $builder->where('supplier_id', $supplierId);
    }

    public function scopeWhereBrand(Builder $builder, string $brand): Builder
    {
        return $builder->whereLike('brand', $brand);
    }

    // TODO: Adicionar filtro para '2022/2023'
    public function scopeWhereYear(Builder $builder, string $startYear, string $endYear): Builder
    {
        return $builder->whereBetween('year', [$startYear, $endYear]);
    }

    public function scopeWherePrice(Builder $builder, string $startPrice, string $endPrice): Builder
    {
        return $builder->whereBetween('price', [$startPrice, $endPrice]);
    }

    public function scopeWhereMileage(Builder $builder, string $startMileage, string $endMileage): Builder
    {
        return $builder->whereBetween('mileage', [$startMileage, $endMileage]);
    }

    public function scopeWhereTransmission(Builder $builder, TransmissionEnum $transmissionEnum): Builder
    {
        return $builder->where('transmission', $transmissionEnum->value);
    }

    public function scopeWhereFuel(Builder $builder, FuelEnum $fuel): Builder
    {
        return $builder->where('fuel', $fuel->value);
    }

    public function scopeWhereColor(Builder $builder, ColorEnum $color): Builder
    {
        return $builder->where('color', $color->description());
    }

    public function scopeWhereDoors(Builder $builder, int $doors): Builder
    {
        return $builder->where('doors_qtt', $doors);
    }

    public function scopeWhereOptions(Builder $builder, array $options): Builder
    {
        return $builder->whereJsonContains('options', $options);
    }
}
