<?php

namespace Patterns\Example\Creational;

class ItemBasicFactory
{
	const BAKERY	= 0;
	const COFFEE	= 1;
	const PRODUCE	= 2;

	public static function create($name, array $context = [])
	{
		switch ($name) {
			case static::BAKERY:
				$instance = new Item\Bakery();
				isset($context['perishable']) && $instance->setPerishable(true);
				return $instance;

			case static::COFFEE:
				return new Item\Coffee($context);

			case static::PRODUCE:
				$intance = new Item\Produce($context);
				isset($context['perishable']) && $instance->setPerishable(true);
				return $instance;

			default:
				throw new \InvalidArgumentException("$name is not a valid item type");
		}
	}
}