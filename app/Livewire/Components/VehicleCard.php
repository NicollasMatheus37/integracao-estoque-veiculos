<?php

namespace App\Livewire\Components;

use App\Helpers\OptionHelper;
use App\Models\Vehicle;
use Livewire\Component;

class VehicleCard extends Component
{
    public Vehicle $vehicle;

    public function render()
    {
        $options = OptionHelper::mapIntoDescriptionFromEnumValues($this->vehicle->options->toArray());

        return view('livewire.components.vehicle-card', [
            'options' => implode(', ', $options),
        ]);
    }
}
