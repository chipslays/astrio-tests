<?php

namespace Box;

use Box\Repository\BoxInterface;
use Box\Exceptions\BoxException;

/**
 * @method static void setData($key, $value = null)
 * @method static array getData($key)
 * @method static void clearData()
 * @method static bool save()
 * @method static void load()
 */
class Box
{
    /**
     * @var BoxInterface
     */
    protected static $repository;

    public static function setRepostitory($repository)
    {
        self::$repository = forward_static_call([$repository, 'getInstance']);
    }

    public function __call($name, $arguments)
    {
        return self::__callRepositoryMethod($name, $arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        return self::__callRepositoryMethod($name, $arguments);
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    protected static function __callRepositoryMethod(string $name, array $arguments = [])
    {
        if (!method_exists(self::$repository, $name)) {
            throw new BoxException("Method '{$name}' not exists", 1);
        }

        return forward_static_call_array([self::$repository, $name], $arguments);
    }
}