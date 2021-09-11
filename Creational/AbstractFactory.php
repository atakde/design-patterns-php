<?php

interface Shape
{
    public function draw();
}

interface Color
{
    public function fill();
}

interface AbstractFactory
{
    public function create(string $type);
}

class Rectange implements Shape
{
    public function draw()
    {
        echo "draw rectange";
    }
}

class Square implements Shape
{
    public function draw()
    {
        echo "draw square";
    }
}

class Red implements Color
{
    public function fill()
    {
        echo "fill red";
    }
}

class Green implements Color
{
    public function fill()
    {
        echo "fill green";
    }
}

class ShapeFactory implements AbstractFactory
{
    public function create(string $type)
    {
        return match ($type) {
            'rectange' => new Rectange(),
            'square' => new Square()
        };
    }
}

class ColorFactory implements AbstractFactory
{
    public function create(string $type)
    {
        return match ($type) {
            'red' => new Red(),
            'green' => new Green()
        };
    }
}

class FactoryProvider
{
    public static function getFactory(string $choice)
    {
        return match ($choice) {
            'shape' => new ShapeFactory(),
            'color' => new ColorFactory()
        };
    }
}

$colorFactory = FactoryProvider::getFactory('color');
$redColor = $colorFactory->create('red');
$redColor->fill();

$shapeFactory = FactoryProvider::getFactory('shape');
$rectangle = $shapeFactory->create('rectange');
$rectangle->draw();
