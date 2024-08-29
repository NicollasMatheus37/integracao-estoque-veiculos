<?php

namespace App\Models;

use App\Base\BaseModel;
use App\Enums\FuelEnum;
use App\Enums\TransmissionEnum;
use App\Models\Scopes\Vehicle\VehicleScopeFilters;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property int $supplier_id
 * @property string $register_id
 * @property string $brand
 * @property string $model
 * @property string $year
 * @property string $version
 * @property string $color
 * @property int $mileage
 * @property FuelEnum|int $fuel
 * @property FuelEnum|int $transmission
 * @property int $doors_qtt
 * @property float $price
 * @property Carbon $date
 * @property array|Collection|string $options
 *
 * @property-read string $supplier_name
 * @property-read Supplier $supplier
 */
class Vehicle extends BaseModel
{
    use HasFactory;
    use VehicleScopeFilters;

    protected $fillable = [
        'supplier_id',
        'register_id',
        'brand',
        'model',
        'year',
        'version',
        'color',
        'mileage',
        'fuel',
        'transmission',
        'doors_qtt',
        'price',
        'date',
        'options',
    ];

    protected function transmission(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => TransmissionEnum::getDescription($value),
            set: fn (TransmissionEnum $value) => $value->value
        );
    }

    protected function fuel(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => FuelEnum::getDescription($value),
            set: fn (FuelEnum $value) => $value->value
        );
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => number_format($value, 2, ',', '.'),
            set: fn ($value) => str_replace(['.', ','], ['', '.'], $value)
        );
    }

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d/m/Y'),
        );
    }

    protected function options(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => new Collection(json_decode($value)),
        );
    }

    protected function supplierName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->supplier->name,
        );
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
}
