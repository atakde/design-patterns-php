<?php

interface Option
{
    public function cost();
}

class Car implements Option
{
    public function cost()
    {
        return 100;
    }
}

class AirCondition implements Option
{

    public function __construct(private Option $option)
    {
    }

    public function cost()
    {
        return $this->option->cost() + 10;
    }
}

class CruiseControl implements Option
{
    public function __construct(private Option $option)
    {
    }

    public function cost()
    {
        return $this->option->cost() + 20;
    }
}
$car = new Car();

$object1 = new AirCondition($car); // Car with air condition
$object2 = new CruiseControl($car); // Car with cruise control
$object3 = new CruiseControl($object1); // Car with cruise control and air condition

echo $object1->cost() . PHP_EOL;
echo $object2->cost() . PHP_EOL;
echo $object3->cost() . PHP_EOL;
