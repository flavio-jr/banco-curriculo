<?php

namespace App\Entity\Enum;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

final class SexoType extends AbstractEnumType
{
    public const MASCULINO = 'M';
    public const FEMININO = 'F';

    protected static $choices = [
        self::MASCULINO => 'Masculino',
        self::FEMININO  => 'Feminino'
    ];
}