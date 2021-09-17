<?php

namespace Box\Repository;

interface BoxInterface
{
    /**
     * @param int|string $key
     * @param int|string|array $value
     * @return void
     */
    public static function setData($key, $value): void;

    /**
     * @param int|string $key
     * @return int|string|array
     */
    public static function getData($key);

    /**
     * @return bool
     */
    public static function save(): void;

    /**
     * @return void
     */
    public static function load(): void;

    /**
     * @return void
     */
    public static function clearData(): void;

    /**
     * @return void
     */
    public static function create(array $config = []): void;
}