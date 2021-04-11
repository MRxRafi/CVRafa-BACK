<?php


namespace App\Entity;


class FrameworkType
{
    const FRONT_END = 'front_end';
    const BACK_END = 'back_end';

    public string $name = self::class;

    public array $values = [
        self::FRONT_END => self::FRONT_END,
        self::BACK_END => self::BACK_END
    ];
}