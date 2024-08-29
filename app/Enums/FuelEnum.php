<?php

namespace App\Enums;

use App\Base\BaseEnumTrait;

enum FuelEnum: int
{
    use BaseEnumTrait;

    case GASOLINE = 1;
    case DIESEL = 2;
    case ELECTRIC = 3;
    case HYBRID = 4;
    case ETHANOL = 5;
    case NATURAL_GAS = 6;
    case FLEX_GASOLINE_ETHANOL = 7;
    case OTHER = 8;

    public static function getDescription(int $value): string
    {
        $enum = self::from($value);

        return match ($enum) {
            self::GASOLINE => 'Gasolina',
            self::DIESEL => 'Diesel',
            self::ELECTRIC => 'Elétrico',
            self::HYBRID => 'Híbrido',
            self::ETHANOL => 'Etanol',
            self::NATURAL_GAS => 'Gás Natural',
            self::FLEX_GASOLINE_ETHANOL => 'Flex',
            default => 'Outros',
        };
    }

    public static function fromDescription(?string $description): self
    {
        $desc = strtolower($description ?? '');

        return match ($desc) {
            'gasolina' => self::GASOLINE,
            'diesel' => self::DIESEL,
            'elétrico' => self::ELECTRIC,
            'híbrido' => self::HYBRID,
            'etanol' => self::ETHANOL,
            'gás natural' => self::NATURAL_GAS,
            'flex' => self::FLEX_GASOLINE_ETHANOL,
            default => self::OTHER,
        };
    }
}
