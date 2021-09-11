<?php

class Customer
{
    public function hello()
    {
        echo "Hello from customer!";
    }
}

class Admin
{
    public function hello()
    {
        echo "Hello from admin!";
    }
}

class StaticFactory
{
    public static function build($type)
    {
        return match ($type) {
            'customer' => new Customer(),
            'admin' => new Admin()
        };
    }
}

$object = StaticFactory::build('customer');
$object->hello();
