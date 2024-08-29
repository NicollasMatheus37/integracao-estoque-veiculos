<?php

namespace App\Livewire\Components;

use App\Models\Vehicle;
use Livewire\Component;

class VehicleCard extends Component
{
    public Vehicle $vehicle;

    public function render()
    {
        return view('livewire.components.vehicle-card');
    }
}
