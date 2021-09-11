<?php

class Car
{
    public function hello()
    {
        echo "Hello!";
    }
}

class SimpleFactory
{
    public function createCar(): Car
    {
        return new Car();
    }
}

$factory = new SimpleFactory();
$car = $factory->createCar();
$car->hello();
