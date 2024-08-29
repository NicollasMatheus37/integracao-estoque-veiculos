<?php

namespace App\Livewire\Components;

use App\Enums\BrandEnum;
use App\Enums\ColorEnum;
use App\Enums\FuelEnum;
use App\Enums\OptionalEnum;
use App\Enums\TransmissionEnum;
use App\Livewire\Forms\VehicleFilterForm;
use Livewire\Component;

class VehicleFilterSidebar extends Component
{
    public VehicleFilterForm $filter;

    public function render()
    {
        return view('livewire.components.vehicle-filter-sidebar', [
            'brands' => BrandEnum::toArray(),
            'transmissions' => TransmissionEnum::getDescriptionArray(),
            'fuels' => FuelEnum::getDescriptionArray(),
            'optionals' => OptionalEnum::toArray(),
            'colors' => ColorEnum::getDescriptionArray(),
        ]);
    }
}
