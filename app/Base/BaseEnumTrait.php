<?php

namespace App\Base;

trait BaseEnumTrait
{
    public static function toArray(): array
    {
        return array_map(fn ($item) => $item->value, self::cases());
    }
}
