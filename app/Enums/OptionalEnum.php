<?php

namespace App\Enums;

use App\Base\BaseEnumTrait;

enum OptionalEnum: string
{
    use BaseEnumTrait;

    case AIR_CONDITIONING = 'Ar condicionado';
    case ELECTRIC_WINDOWS = 'Vidros elétricos';
    case POWER_STEERING = 'Direção hidráulica';
    case ELECTRIC_LOCKS = 'Travas elétricas';
    case LED_HEADLIGHTS = 'Faróis de LED';
    case ALLOY_WHEELS = 'Rodas de liga leve';
    case LEATHER_SEATS = 'Bancos de couro';
    case MULTIMEDIA_CENTER = 'Central multimídia';
    case REAR_CAMERA = 'Câmera de ré';
    case PARKING_SENSOR = 'Sensor de estacionamento';
    case SOLAR_ROOF = 'Teto solar';
}
