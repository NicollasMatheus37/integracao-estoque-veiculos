<?php

namespace App\Enums;

use App\Base\BaseEnumTrait;

enum TransmissionEnum: int
{
    use BaseEnumTrait;

    case AUTOMATIC = 1;
    case MANUAL = 2;
    case SEMI_AUTOMATIC = 3;
    case CVT = 4;
    case OTHER = 5;

    public static function getDescription(int $value): string
    {
        $enum = self::from($value);

        return match ($enum) {
            self::AUTOMATIC => 'Automático',
            self::MANUAL => 'Manual',
            self::SEMI_AUTOMATIC => 'Semi-automático',
            self::CVT => 'CVT',
            default => 'Outros',
        };
    }

    public static function fromDescription(?string $description): self
    {
        $desc = strtolower($description ?? '');

        return match ($desc) {
            'automático', 'automatica', 'automatico' => self::AUTOMATIC,
            'manual' => self::MANUAL,
            'semi-automático' => self::SEMI_AUTOMATIC,
            'cvt' => self::CVT,
            default => self::OTHER,
        };
    }
}
