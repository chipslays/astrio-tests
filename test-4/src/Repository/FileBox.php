<?php

namespace Box\Repository;

use Box\Repository\AbstractBox;

class FileBox extends AbstractBox
{
    /**
     * @var string
     */
    private static $dir;

    /**
     * @param array $config
     */
    public static function create(array $config = []): void
    {
        self::$dir = rtrim($config['dir'], '/\\');
    }

    public static function save(): void
    {
        $data = array_merge(self::loadData(), self::$data);
        file_put_contents(self::$dir . '/box.repository.json', json_encode($data)) !== false;
    }

    public static function load(): void
    {
        self::$data = self::loadData();
    }

    private static function loadData(): array
    {
        return json_decode(file_get_contents(self::$dir . '/box.repository.json'), true);
    }
}
