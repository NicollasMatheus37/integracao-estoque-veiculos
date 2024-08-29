<?php

namespace App\Livewire;

use App\Livewire\Forms\VehicleFilterForm;
use App\Models\Vehicle;
use App\Services\ExportVehicleService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class VehiclesList extends Component
{
    public VehicleFilterForm $filter;
    public Collection $vehicles;

    public function mount()
    {
        $this->vehicles = Vehicle::get();
    }

    #[On('applyFilter')]
    public function applyFilter(): void
    {
        $this->vehicles = $this->filter->getFilteredVehicles();
    }

    #[On('clearFilter')]
    public function clearFilter(): void
    {
        $this->filter->reset();
        $this->vehicles = Vehicle::get();
    }

    public function export()
    {
        return response()->streamDownload(function () {
            echo ExportVehicleService::export($this->vehicles);
        }, 'vehicles.xls');
    }

    public function render()
    {
        return view('livewire.vehicles-list', [
            'vehicles' => $this->vehicles,
        ]);
    }
}
