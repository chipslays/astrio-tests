<?php

namespace Box\Support;

use Box\Exceptions\BoxException;

trait Singleton
{
    private static $instances = [];

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new BoxException("Cannot unserialize a singleton.");
    }

    public static function getInstance(): self
    {
        $class = static::class;

        if (!isset(self::$instances[$class])) {
            self::$instances[$class] = new static();
        }

        return self::$instances[$class];
    }
}
