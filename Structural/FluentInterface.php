<?php

class Car
{
    private string $brand;
    private string $model;
    private int $year;

    public function setBrand(string $brand)
    {
        $this->brand = $brand;
        return $this;
    }

    public function setModel(string $model)
    {
        $this->model = $model;
        return $this;
    }

    public function setYear(int $year)
    {
        $this->year = $year;
        return $this;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getYear()
    {
        return $this->year;
    }
}

$car = new Car();
$car->setBrand("Mercedes")->setModel("GLA")->setYear("2020");

echo $car->getBrand() . PHP_EOL;
echo $car->getModel() . PHP_EOL;
echo $car->getYear() . PHP_EOL;
