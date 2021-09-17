<?php

interface Shape
{
    public function draw();
}

class Rectangle
{
    public function draw()
    {
        echo "Draw rectangle." . PHP_EOL;
    }
}

class Circle
{
    public function draw()
    {
        echo "Draw circle." . PHP_EOL;
    }
}

class Square
{
    public function draw()
    {
        echo "Draw square." . PHP_EOL;
    }
}
/**
 * Note: Good facade has no new in it.
 */
class ShapeMaker
{
    public function __construct(
        private Rectangle $rectangle,
        private Circle $circle,
        private Square $square
    ) {
    }

    public function drawRectange()
    {
        $this->rectangle->draw();
    }

    public function drawCircle()
    {
        $this->circle->draw();
    }

    public function drawSquare()
    {
        $this->square->draw();
    }

    public function drawAll()
    {
        $this->rectangle->draw();
        $this->circle->draw();
        $this->square->draw();
    }
}

$rectangle = new Rectangle();
$circle = new Circle();
$square = new Square();


$shapeMaker = new ShapeMaker($rectangle, $circle, $square);
$shapeMaker->drawRectange();
$shapeMaker->drawCircle();
$shapeMaker->drawSquare();
$shapeMaker->drawAll();
