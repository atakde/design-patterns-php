<?php

interface MenuInterface
{
    public function render();
}

class MenuItem implements MenuInterface
{

    public function __construct(private string $menuName)
    {
    }

    public function render()
    {
        echo $this->menuName;
    }
}

class Menu implements MenuInterface
{

    private $items = [];

    public function __construct(private string $menuName)
    {
    }

    public function addSubMenu(MenuInterface $menuItem)
    {
        $this->items[] = $menuItem;
    }

    public function render()
    {
        echo "Main Menu: " . $this->menuName . PHP_EOL;
        foreach ($this->items as $each) {
            echo $each->render() . PHP_EOL;
        }
    }
}

$object = new Menu('Test Menu');
$object->addSubMenu(new MenuItem('Sub Menu 1'));
$object->addSubMenu(new MenuItem('Sub Menu 2'));
$object->addSubMenu(new MenuItem('Sub Menu 3'));
$object->render();
