<?php

namespace App\Enums;

use App\Base\BaseEnumTrait;

enum ColorEnum: string
{
    use BaseEnumTrait;

    case WHITE = 'white';
    case BLACK = 'black';
    case SILVER = 'silver';
    case RED = 'red';
    case GREY = 'grey';
    case BLUE = 'blue';
    case GREEN = 'green';
    case YELLOW = 'yellow';
    case ORANGE = 'orange';
    case OTHER = 'other';

    public static function getDescription(string $value): string
    {
        $enum = self::from($value);

        return match ($enum) {
            self::WHITE => 'Branco',
            self::BLACK => 'Preto',
            self::SILVER => 'Prata',
            self::RED => 'Vermelho',
            self::GREY => 'Cinza',
            self::BLUE => 'Azul',
            self::GREEN => 'Verde',
            self::YELLOW => 'Amarelo',
            self::ORANGE => 'Laranja',
            self::OTHER => 'Outra',
        };
    }

    public static function getDescriptionArray(): array
    {
        return [
            self::getDescription(self::WHITE->value),
            self::getDescription(self::BLACK->value),
            self::getDescription(self::SILVER->value),
            self::getDescription(self::RED->value),
            self::getDescription(self::GREY->value),
            self::getDescription(self::BLUE->value),
            self::getDescription(self::GREEN->value),
            self::getDescription(self::YELLOW->value),
            self::getDescription(self::ORANGE->value),
            self::getDescription(self::OTHER->value),
        ];
    }
}
