<?php

use Patterns\Example\Creational\ItemFactory,
	Patterns\Example\Creational\ItemBasicFactory;

// Create a coffee item using the basic factory
$coffeeItem = ItemBasicFactory::create(ItemBasicFactory::COFFEE, ['region' => Item\Coffee::REGION_SOUTH_AMERICA]);

// Create a coffee item using the instantiated, slightly more complex factory
$factory = new ItemFactory;
$factory->setDi($di);
$coffeeItem = $factory->create(ItemFactory::COFFEE, ['region' => Item\Coffee::REGION_SOUTH_AMERICA]);