<?php
namespace directcall;

use Laminas\ApiTools\Provider\ApiToolsProviderInterface;


use directcall\Model\Table\ProviderTable;
use Laminas\Db\Adapter\Adapter;
use Laminas\Http\Response; # <- add this
use Laminas\Mvc\MvcEvent; # add this

class Module implements ApiToolsProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'Laminas\ApiTools\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
    public function getFormElementConfig()
    {
        return [
            'factories' => [
                CreateForm::class => function($sm) {
                    $categoriesTable = $sm->get(CategoriesTable::class);
                    return new CreateForm($categoriesTable);
                }
            ]
        ];
	}
    public function getServiceConfig()
    {
    	return [
    		'factories' => [
    			ProviderTable::class => function($sm) {
    				$dbAdapter = $sm->get(Adapter::class);
    				return new ProviderTable($dbAdapter);
                }
    		]
    	];
    }

}
