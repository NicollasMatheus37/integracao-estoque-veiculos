<?php

namespace App\Helpers;

use App\Enums\OptionEnum;

class OptionHelper
{
    public static function mapIntoEnumFromDescription(array $options): array
    {
        return array_map(
            fn ($option) => OptionEnum::fromDescription($option),
            $options
        );
    }

    public static function mapIntoEnumValuesFromDescription(array $options): array
    {
        return array_map(
            fn ($option) => OptionEnum::fromDescription($option)->value,
            $options
        );
    }

    public static function mapIntoDescriptionFromEnumValues(array $options): array
    {
        return array_map(
            fn ($option) => OptionEnum::getDescription($option),
            $options
        );
    }

    public static function stripAccents($str): string
    {
        return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    }
}
