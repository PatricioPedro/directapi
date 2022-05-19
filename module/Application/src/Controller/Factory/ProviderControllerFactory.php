<?php

declare(strict_types=1);

namespace Application\Controller\Factory;

use Application\Controller\ProviderController;
use Application\Model\Table\ProviderTable;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class ProviderControllerFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName ,array $options = null)
	{
		return new ProviderController(
            $container->get(ProviderTable::class)
		);
	}
}
