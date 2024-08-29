<?php

namespace App\Enums;

use App\Base\BaseEnumTrait;

enum ImportLogStatusEnum: int
{
    use BaseEnumTrait;

    case PROCESSING = 1;
    case SUCCESS = 2;
    case FAILED = 3;

    public static function getDescription(int $value): string
    {
        $enum = self::from($value);

        return match ($enum) {
            self::PROCESSING => 'Em processamento',
            self::SUCCESS => 'Concluído',
            self::FAILED => 'Falhou',
        };
    }
}
