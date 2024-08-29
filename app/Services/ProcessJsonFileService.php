<?php

namespace App\Services;

use App\Enums\FuelEnum;
use App\Enums\TransmissionEnum;
use App\Helpers\OptionHelper;
use App\Models\ImportLog;
use App\Models\Vehicle;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class ProcessJsonFileService
{
    public static function process(string $filename, ImportLog $importLog): void
    {
        $fileContent = Storage::get($filename);
        $data = json_decode($fileContent, true);

        $vehiclesData = collect($data['veiculos'] ?? []);

        if ($vehiclesData->isEmpty()) {
            throw new Exception('Invalid file format');
        }

        $vehiclesData->each(function ($item, $key) use ($importLog) {
            try {
                self::processItem(new Collection($item), $importLog);
                $importLog->processed_items++;
            } catch (Exception $e) {
                \Log::info(print_r($e->getMessage(), true));
                $importLog->error_items++;
            }
        });
    }

    private static function processItem(Collection $collect, ImportLog $importLog): void
    {
        Vehicle::updateOrCreate([
            'supplier_id' => $importLog->supplier_id,
            'register_id' => $collect->get('id'),
        ], [
            'model' => $collect->get('modelo'),
            'brand' => $collect->get('marca'),
            'year' => $collect->get('ano'),
            'version' => $collect->get('versao'),
            'color' => $collect->get('cor'),
            'mileage' => $collect->get('km'),
            'fuel' => FuelEnum::fromDescription($collect->get('combustivel')),
            'transmission' => TransmissionEnum::fromDescription($collect->get('cambio')),
            'doors_qtt' => $collect->get('portas'),
            'price' => $collect->get('preco'),
            'date' => new Carbon($collect->get('data')),
            'options' => OptionHelper::mapIntoEnumFromDescription($collect->get('opcionais')),
        ]);
    }
}
