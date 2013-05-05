<?php

namespace Patterns\Example\Creational;

class ItemFactory
{
	use \Patterns\Creational\FactoryTrait;

	const BAKERY	= 0;
	const COFFEE	= 1;
	const PRODUCE	= 2;

	/**
	 * @var DiInterface
	 */
	protected $di;

	public function setDi(DiInterface $di)
	{
		$this->di = $di;
		return $this;
	}

	public function create($name, array $context = [])
	{
		$db = $this->db->get('db');
		$cache = $this->db->get('cache');

		switch ($name) {
			case static::BAKERY:
				$instance = new Item\Bakery($context);
				break;
			case static::COFFEE:
				$instance = new Item\Coffee($context);
				break;
			case static::PRODUCE:
				$intance = new Item\Produce($context);
				break;
			default:
				throw new \InvalidArgumentException("$name is not a valid item type");
		}

		$instance->setDb($db);
		$instance->setCache($cache);
		return $instance;
	}
}