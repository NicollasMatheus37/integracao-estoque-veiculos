<?php

namespace App\Enums;

use App\Base\BaseEnumTrait;

enum BrandEnum: string
{
    use BaseEnumTrait;

    case TOYOTA = 'Toyota';
    case VOLKSWAGEN = 'Volkswagen';
    case FORD = 'Ford';
    case NISSAN = 'Nissan';
    case HYUNDAI = 'Hyundai';
    case HONDA = 'Honda';
    case CHEVROLET = 'Chevrolet';
    case KIA = 'Kia';
    case RENAULT = 'Renault';
    case MERCEDES_BENZ = 'Mercedes-Benz';
    case PEUGEOT = 'Peugeot';
    case BMW = 'BMW';
    case AUDI = 'Audi';
    case MAZDA = 'Mazda';
    case FIAT = 'Fiat';
    case BUICK = 'Buick';
    case JEEP = 'Jeep';
    case SUZUKI = 'Suzuki';
    case CAOA_CHERY = 'Caoa Chery';
}
