<?php

namespace App\Livewire\Forms;

use App\Enums\BrandEnum;
use App\Enums\ColorEnum;
use App\Enums\FuelEnum;
use App\Enums\TransmissionEnum;
use App\Helpers\OptionHelper;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Form;

class VehicleFilterForm extends Form
{
    private const fromToArray = ['from' => null, 'to' => null];

    public ?string $term = null;

    public ?int $supplier = null;
    public ?BrandEnum $brand = null;
    public array $year = self::fromToArray;
    public array $price = self::fromToArray;
    public array $mileage = self::fromToArray;
    public ?TransmissionEnum $transmission = null;
    public ?FuelEnum $fuel = null;
    public ?ColorEnum $color = null;
    public ?int $doors_qtt = null;
    public ?array $options = [];

    public function getFilteredVehicles(): Collection
    {
        return Vehicle::when($this->term, fn ($query) => $query->whereTerm($this->term))
            ->when($this->supplier, fn ($query) => $query->whereSupplier($this->supplier))
            ->when($this->brand, fn ($query) => $query->whereBrand($this->brand->value))
            ->when($this->year['from'] && $this->year['to'], fn ($query) => $query->whereYear($this->year['from'], $this->year['to']))
            ->when($this->price['from'] && $this->price['to'], fn ($query) => $query->wherePrice($this->price['from'], $this->price['to']))
            ->when($this->mileage['from'] && $this->mileage['to'], fn ($query) => $query->whereMileage($this->mileage['from'], $this->mileage['to']))
            ->when($this->transmission, fn ($query) => $query->whereTransmission($this->transmission))
            ->when($this->fuel, fn ($query) => $query->whereFuel($this->fuel))
            ->when($this->color, fn ($query) => $query->whereColor($this->color))
            ->when($this->doors_qtt, fn ($query) => $query->whereDoorsQtt($this->doors_qtt))
            ->when(!empty($this->options), fn ($query) => $query->whereOptions(OptionHelper::mapIntoEnumValuesFromDescription($this->options)))
            ->get();
    }
}
