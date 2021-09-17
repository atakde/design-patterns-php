<?php

interface Vecihle
{
    public function startEngine();
}

class Car implements Vecihle
{
    public function startEngine()
    {
        echo "Car engine started." . PHP_EOL;
    }
}

class Truck implements Vecihle
{
    public function startEngine()
    {
        echo "Truck engine started." . PHP_EOL;
    }
}

class Bus implements Vecihle
{
    public function startEngine()
    {
        echo "Bus engine started." . PHP_EOL;
    }
}

class Travel
{
    public function __construct(private Vecihle $vecihle)
    {
    }

    public function operate()
    {
        $this->vecihle->startEngine();
    }
}

$car = new Car();
$travel = new Travel($car);
$travel->operate();

$bus = new Bus();
$travel = new Travel($bus);
$travel->operate();
