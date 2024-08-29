<?php

namespace App\Services;

use App\Livewire\Forms\VehicleFilterForm;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class ExportVehicleService
{
    public static function export(VehicleFilterForm $filter): string
    {
        $vehicles = $filter->getFilteredVehicles();

        return self::exportXlsx($vehicles);
    }

    private static function exportXlsx(Collection $vehicles)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'Fornecedor', 'ID de registro', 'Modelo', 'Marca', 'Ano', 'Versão', 'Cor',
            'Quilometragem', 'Tipo de Combustível', 'Câmbio', 'Portas', 'Preço', 'Data', 'Opcionais'
        ];

        $sheet->fromArray($headers);

        $row = 2;
        $vehicles->each(function ($vehicle) use ($sheet, &$row) {
            $sheet->fromArray([
                $vehicle->supplier_name,
                $vehicle->register_id,
                $vehicle->model,
                $vehicle->brand,
                $vehicle->year,
                $vehicle->version,
                $vehicle->color,
                $vehicle->mileage,
                $vehicle->fuel,
                $vehicle->transmission,
                $vehicle->doors_qtt,
                $vehicle->price,
                $vehicle->date,
                implode(', ', $vehicle->options->toArray())
            ], null, 'A' . $row);
            $row++;
        });

        $writer = new Xls($spreadsheet);
        $tempFile = tempnam(sys_get_temp_dir(), 'vehicles') . '.xls';
        $writer->save($tempFile);

        return file_get_contents($tempFile);
    }
}
