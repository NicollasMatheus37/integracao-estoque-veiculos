<?php

namespace App\Livewire;

use App\Enums\ImportLogStatusEnum;
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
            $importLog = ImportVehicleService::import($this->file, $this->supplierId);
            $this->supplierId = null;
            $this->file = null;

            $message = match ($importLog->status) {
                ImportLogStatusEnum::PROCESSING => 'A importação do arquivo não pode ser finalizada.',
                ImportLogStatusEnum::SUCCESS => 'Arquivo importado com sucesso!',
                ImportLogStatusEnum::FAILED => 'Falha ao importar arquivo.',
            };

            $this->js("alert('$message')");
            if ($importLog->status == ImportLogStatusEnum::FAILED) {

                return;
            }

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
