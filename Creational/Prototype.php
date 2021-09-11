<?php

abstract class MealPrototype
{
    protected $mealName;
    protected $mealCategory;

    public function getMealName(): string
    {
        return $this->mealName;
    }

    public function setMealName(string $name): string
    {
        return $this->mealName = $name;
    }
}

class VegetableMealPrototype extends MealPrototype
{
    protected $mealCategory = "vegetable";

    /**
     * Clone..
     */
    public function __clone()
    {
    }
}

class MeatMealPrototype extends MealPrototype
{
    protected $mealCategory = "meat";

    /**
     * Clone..
     */
    public function __clone()
    {
    }
}

$meatMealPrototype = new MeatMealPrototype();
$vegetableMealPrototype = new VegetableMealPrototype();

for ($i = 0; $i < 5; $i++) {
    $object = clone $meatMealPrototype;
    $object->setMealName('Meal Menu #' . $i);
    echo $object->getMealName() . PHP_EOL;
}

for ($i = 0; $i < 5; $i++) {
    $object = clone $vegetableMealPrototype;
    $object->setMealName('Vegetable Menu #' . $i);
    echo $object->getMealName() . PHP_EOL;
}
