<?php

/**
 * 
 * Useful when to minimise memory usage.
 * Reduce the number of created objects and icrease the performance.
 */

interface Shape
{
    public function draw();
}

class Circle implements Shape
{
    public function __construct(
        private string $text,
        private string $color
    ) {
    }
    public function draw()
    {
        echo "Draw circle. " . $this->text . ' ' . $this->color;
    }
}

class Square implements Shape
{
    public function __construct(
        private string $text,
        private string $color
    ) {
    }
    public function draw()
    {
        echo "Draw square. " . $this->text . ' ' . $this->color;
    }
}

class ShapeFactory
{
    private $shapes = [];

    public function getShape(string $type)
    {
        if (!isset($this->shapes[$type])) {
            $this->shapes[$type] = match ($type) {
                'circle' => new Circle('Circle 1', 'red'),
                'rectangle' => new Square('Square 1', 'blue')
            };
        }

        return $this->shapes[$type];
    }
}

$shapeFactory = new ShapeFactory();
$rectangle1 = $shapeFactory->getShape('rectangle');
$rectangle2 = $shapeFactory->getShape('rectangle');

if ($rectangle1 === $rectangle2) {
    echo "It works.";
} else {
    echo "Not works.";
}
