<?php

namespace App\Services;

use App\Enums\FuelEnum;
use App\Enums\TransmissionEnum;
use App\Models\ImportLog;
use App\Models\Vehicle;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class ProcessXmlFileService
{
    public static function process(string $filename, ImportLog $importLog): void
    {
        $fileContent = Storage::get($filename);
        $xml = simplexml_load_string($fileContent);
        $json = json_decode(json_encode($xml), true);
        $array = data_get($json, 'veiculos.veiculo', []);
        $collect = new Collection($array);

        if ($collect->isEmpty()) {
            throw new Exception('Invalid file format');
        }

        $collect->each(function ($item, $key) use ($importLog) {
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
            'register_id' => $collect->get('codigoVeiculo'),
        ], [
            'model' => $collect->get('modelo'),
            'brand' => $collect->get('marca'),
            'year' => $collect->get('ano'),
            'version' => $collect->get('versao'),
            'color' => $collect->get('cor'),
            'mileage' => $collect->get('quilometragem'),
            'fuel' => FuelEnum::fromDescription($collect->get('tipoCombustivel')),
            'transmission' => TransmissionEnum::fromDescription($collect->get('cambio')),
            'doors_qtt' => $collect->get('portas'),
            'price' => str_replace('.', ',', $collect->get('precoVenda')),
            'date' => Carbon::createFromFormat('d/m/Y H:i', $collect->get('ultimaAtualizacao')),
            'options' => json_encode($collect->input('opcionais.opcional')),
        ]);
    }
}
