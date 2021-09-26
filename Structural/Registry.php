<?php

/**
 * It is better to use Dependency Injection.
 */
class Registry
{
    private static $registry = [];

    public static function set($key, $value)
    {
        self::$registry[$key] = $value;
    }

    public static function get($key)
    {
        if (isset(self::$registry[$key])) {
            return self::$registry[$key];
        }

        return false;
    }
}

Registry::set('db', new mysqli());
var_dump(Registry::get('db'));
