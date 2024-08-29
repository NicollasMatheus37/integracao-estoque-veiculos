<?php

namespace App\Livewire;

use App\Livewire\Forms\VehicleFilterForm;
use App\Services\ExportVehicleService;
use Livewire\Component;
use Livewire\WithPagination;

class VehiclesList extends Component
{
    use WithPagination;

    public VehicleFilterForm $filter;

    public function export()
    {
        return response()->streamDownload(function () {
            echo ExportVehicleService::export($this->filter);
        }, 'vehicles.xls');
    }

    public function render()
    {
        return view('livewire.vehicles-list', [
            'vehicles' => $this->filter->vehicles,
            'filter' => $this->filter,
        ]);
    }
}
