<?php

namespace App\Livewire\Forms;

use App\Enums\BrandEnum;
use App\Enums\ColorEnum;
use App\Enums\FuelEnum;
use App\Enums\OptionalEnum;
use App\Enums\TransmissionEnum;
use App\Models\Supplier;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Form;

class VehicleFilterForm extends Form
{
    private const fromToArray = ['from' => 10, 'to' => 20];

    public Collection|array $vehicles = [];

    public string $term = '';

    public ?BrandEnum $brand = BrandEnum::AUDI;
    public array $year = self::fromToArray;
    public array $price = self::fromToArray;
    public array $mileage = self::fromToArray;
    public ?TransmissionEnum $transmission = TransmissionEnum::AUTOMATIC;
    public ?FuelEnum $fuel = FuelEnum::HYBRID;
    public ?ColorEnum $color = ColorEnum::ORANGE;
    public ?int $doors_qtt = 4;
    public ?array $options = [
        OptionalEnum::AIR_CONDITIONING,
        OptionalEnum::ALLOY_WHEELS,
    ];

    public ?Supplier $supplier = null;
    public ?string $version = null;
    public ?Carbon $date = null;

    public function apply(): Collection
    {
        $builder = Vehicle::query();

        $builder->whereTerm($this->term);

        $this->vehicles = $builder->get();

        return $this->vehicles;
    }

    public function clear()
    {
        $this->term = '';
        $this->supplier = null;
        $this->brand = null;
        $this->year = self::fromToArray;
        $this->mileage = self::fromToArray;
        $this->price = self::fromToArray;
        $this->color = null;
        $this->fuel = null;
        $this->transmission = null;
        $this->doors_qtt = null;
        $this->options = null;
        $this->version = null;
        $this->date = null;

        $this->apply();
    }
}
