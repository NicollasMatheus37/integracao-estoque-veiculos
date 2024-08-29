<?php

namespace App\Enums;

use App\Base\BaseEnumTrait;
use App\Helpers\OptionHelper;

enum OptionEnum: string
{
    use BaseEnumTrait;

    case AIR_CONDITIONING = 'AIR_CONDITIONING';
    case ELECTRIC_WINDOWS = 'ELECTRIC_WINDOWS';
    case POWER_STEERING = 'POWER_STEERING';
    case ELECTRIC_LOCKS = 'ELECTRIC_LOCKS';
    case LED_HEADLIGHTS = 'LED_HEADLIGHTS';
    case ALLOY_WHEELS = 'ALLOY_WHEELS';
    case LEATHER_SEATS = 'LEATHER_SEATS';
    case MULTIMEDIA_CENTER = 'MULTIMEDIA_CENTER';
    case REAR_CAMERA = 'REAR_CAMERA';
    case PARKING_SENSOR = 'PARKING_SENSOR';
    case SOLAR_ROOF = 'SOLAR_ROOF';
    case OTHER = 'OTHER';

    public static function getDescription(string $value): string
    {
        $enum = self::from($value);

        return match ($enum) {
            self::AIR_CONDITIONING => 'Ar Condicionado',
            self::ELECTRIC_WINDOWS => 'Vidros Elétricos',
            self::POWER_STEERING => 'Direção Hidráulica',
            self::ELECTRIC_LOCKS => 'Travas Elétricas',
            self::LED_HEADLIGHTS => 'Faróis de LED',
            self::ALLOY_WHEELS => 'Rodas de Liga Leve',
            self::LEATHER_SEATS => 'Bancos de Couro',
            self::MULTIMEDIA_CENTER => 'Central Multimídia',
            self::REAR_CAMERA => 'Câmera de Ré',
            self::PARKING_SENSOR => 'Sensor de Estacionamento',
            self::SOLAR_ROOF => 'Teto Solar',
            default => 'Outros',
        };
    }

    public static function fromDescription(string $description): self
    {
        $description = OptionHelper::stripAccents(mb_strtolower($description));

        return match ($description) {
            'ar condicionado' => self::AIR_CONDITIONING,
            'vidros eletricos' => self::ELECTRIC_WINDOWS,
            'direcao hidraulica' => self::POWER_STEERING,
            'travas eletricas' => self::ELECTRIC_LOCKS,
            'farois de led' => self::LED_HEADLIGHTS,
            'rodas de liga leve' => self::ALLOY_WHEELS,
            'bancos de couro' => self::LEATHER_SEATS,
            'central multimidia' => self::MULTIMEDIA_CENTER,
            'camera de re' => self::REAR_CAMERA,
            'sensor de estacionamento' => self::PARKING_SENSOR,
            'teto solar' => self::SOLAR_ROOF,
            default => self::OTHER,
        };
    }
}
