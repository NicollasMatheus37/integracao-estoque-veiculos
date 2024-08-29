<?php

namespace App\Livewire;

use App\Models\ImportLog;
use App\Models\Supplier;
use App\Services\ImportVehicleService;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ImportVehicles extends Component
{
    use WithFileUploads;

    #[Validate('required', message: 'É necessário selecionar um fornecedor')]
    public ?int $supplierId = null;

    #[Validate('required|file', message: 'É necessário selecionar um arquivo')]
    public ?TemporaryUploadedFile $file = null;

    public bool $loading = false;

    public function import()
    {
        $this->loading = true;
        try {
            $this->validate();
            ImportVehicleService::import($this->file, $this->supplierId);
            $this->supplierId = null;
            $this->file = null;
            $this->js("alert('Arquivo importado!')");
        } finally {
            $this->loading = false;
        }
    }

    public function render()
    {
        $suppliers = Supplier::all();
        $importLogs = ImportLog::orderByDesc('created_at')->get();

        return view('livewire.import-vehicles', [
            'suppliers' => $suppliers,
            'importLogs' => $importLogs
        ]);
    }
}
