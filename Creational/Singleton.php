<?php

class Singleton
{

    private static $instance = null;

    /**
     * prevent from creating multiple instances
     */
    private function __construct()
    {
    }

    /**
     * prevent from creating multiple instances
     */
    private function __clone()
    {
    }

    /**
     * prevent from creating multiple instances
     */
    public function __wakeup()
    {
    }

    public static function getInstance(): Singleton
    {
        if (!self::$instance) {
            self::$instance = new Singleton();
        }

        return self::$instance;
    }
}

$instance1 = Singleton::getInstance();
$instance2 = Singleton::getInstance();

if ($instance1 === $instance2) {
    echo "Singleton works..";
} else {
    echo "Singleton not works.";
}
