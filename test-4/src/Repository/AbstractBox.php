<?php

namespace Box\Repository;

use Box\Repository\BoxInterface;
use Box\Support\Singleton;

abstract class AbstractBox implements BoxInterface
{
    use Singleton;

    /**
     * @var array
     */
    protected static $data = [];

    public static function setData($key, $value = null): void
    {
        self::$data[$key] = $value;
    }

    public static function getData($key)
    {
        return self::$data[$key] ?? null;
    }

    public static function clearData(): void
    {
        self::$data = [];
    }
}