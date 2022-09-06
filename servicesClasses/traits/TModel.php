<?php

trait TModel
{
    public static function findOne(): array
    {
        return array_shift(self::$data);
    }

    public static function findAll(): array
    {
        return self::$data;
    }
}
