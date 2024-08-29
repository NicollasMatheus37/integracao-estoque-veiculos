<?php

namespace App\Livewire\Components;

use App\Enums\BrandEnum;
use App\Enums\ColorEnum;
use App\Enums\FuelEnum;
use App\Enums\OptionEnum;
use App\Enums\TransmissionEnum;
use App\Livewire\Forms\VehicleFilterForm;
use App\Models\Supplier;
use Livewire\Component;

class VehicleFilterSidebar extends Component
{
    public VehicleFilterForm $filter;

    public function render()
    {
        return view('livewire.components.vehicle-filter-sidebar', [
            'suppliers' => Supplier::get(),
            'brands' => BrandEnum::toArray(),
            'transmissions' => TransmissionEnum::cases(),
            'fuels' => FuelEnum::cases(),
            'options' => OptionEnum::cases(),
            'colors' => ColorEnum::cases(),
        ]);
    }
}
