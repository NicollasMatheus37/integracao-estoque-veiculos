<?php

namespace Database\Seeders;

use App\Enums\FuelEnum;
use App\Enums\TransmissionEnum;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicle::create([
            'supplier_id' => 1,
            'register_id' => '4343253',
            'brand' => 'Chevrolet',
            'model' => 'Onix',
            'year' => '2019',
            'version' => 'Activ',
            'color' => 'Laranjado',
            'mileage' => 105600,
            'fuel' => FuelEnum::FLEX_GASOLINE_ETHANOL,
            'transmission' => TransmissionEnum::AUTOMATIC,
            'doors_qtt' => 4,
            'price' => 70000,
            'date' => '2023-08-24 20:32:47',
            'options' => json_encode([
                "Ar condicionado",
                "Vidros elétricos",
                "Direção hidráulica",
                "Travas elétricas"
            ]),
        ]);
    }
}
