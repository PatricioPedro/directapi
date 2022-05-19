<?php

declare(strict_types=1);

namespace directcall\V1\Rest\Provider;

use directcall\Controller\ProviderController;
use directcall\Model\Table\ProviderTable;
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
