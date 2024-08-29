<?php

namespace App\Base;

trait BaseEnumTrait
{
    public static function toArray(): array
    {
        return array_map(fn ($item) => $item->value, self::cases());
    }

    /** Implement the getDescription method in the enum class */
    public static function getDescription(int|string $value): string
    {
        return '';
    }

    public function description(): string
    {
        return self::getDescription($this->value);
    }
}
