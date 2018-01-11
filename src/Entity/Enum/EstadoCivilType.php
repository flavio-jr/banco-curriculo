<?php

namespace App\Entity\Enum;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

class EstadoCivilType extends AbstractEnumType
{
    public const SOLTEIRO = 'S';
    public const CASADO = 'C';

    public static $choices = [
        self::SOLTEIRO => 'Solteiro',
        self::CASADO   => 'Casado'
    ];
}