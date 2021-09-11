<?php

abstract class Vecihle
{
    public $engine;
    public $wheel;
    public $doors;
}

class Car extends Vecihle
{
    public function getDetails()
    {
        return 'Car details' . var_export($this, true);
    }
}

class Truck extends Vecihle
{
    public function getDetails()
    {
        return 'Truck details' . var_export($this, true);
    }
}

class Bus extends Vecihle
{
    public function getDetails()
    {
        return 'Bus details' . var_export($this, true);
    }
}

interface VecihleBuilder
{
    public function addEngine();
    public function addWheel();
    public function addDoors();
    public function getVecihle();
}

class CarBuilder implements VecihleBuilder
{

    private $vecihle;
    private $options;

    public function __construct(array $options)
    {
        $this->vecihle = new Car();
        $this->options = $options;
    }

    public function addEngine()
    {
        $this->vecihle->engine = $this->options['engine'];
    }

    public function addWheel()
    {
        $this->vecihle->wheel = $this->options['wheel'];
    }

    public function addDoors()
    {
        $this->vecihle->doors = $this->options['doors'];
    }

    public function getVecihle()
    {
        return $this->vecihle->getDetails();
    }
}

class BusBuilder implements VecihleBuilder
{

    private $vecihle;
    private $options;

    public function __construct(array $options)
    {
        $this->vecihle = new Bus();
        $this->options = $options;
    }

    public function addEngine()
    {
        $this->vecihle->engine = $this->options['engine'];
    }

    public function addWheel()
    {
        $this->vecihle->wheel = $this->options['wheel'];
    }

    public function addDoors()
    {
        $this->vecihle->doors = $this->options['doors'];
    }

    public function getVecihle()
    {
        return $this->vecihle->getDetails();
    }
}

class TruckBuilder implements VecihleBuilder
{

    private $vecihle;
    private $options;

    public function __construct(array $options)
    {
        $this->vecihle = new Truck();
        $this->options = $options;
    }

    public function addEngine()
    {
        $this->vecihle->engine = $this->options['engine'];
    }

    public function addWheel()
    {
        $this->vecihle->wheel = $this->options['wheel'];
    }

    public function addDoors()
    {
        $this->vecihle->doors = $this->options['doors'];
    }

    public function getVecihle()
    {
        return $this->vecihle->getDetails();
    }
}

class VecihleDirector
{
    public function build(VecihleBuilder $vecihle)
    {
        $vecihle->addEngine();
        $vecihle->addWheel();
        $vecihle->addDoors();

        return $vecihle->getVecihle();
    }
}

$truck = (new VecihleDirector())->build(new TruckBuilder(['engine' => 'gasoline', 'wheel' => 14, 'doors' => 2]));
echo $truck;
