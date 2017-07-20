<?php

namespace Blog;

// Add these import statements:
use Zend\Router\Http\Segment;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
* 
*/
class Module implements ConfigProviderInterface
{
	
	public function getConfig()
	{
		return include __DIR__ ."/../config/module.config.php";
	}

	// getConfig() method is here

    // Add this method:
    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\BlogTable::class => function($container) {
                    $tableGateway = $container->get(Model\BlogTableGateway::class);
                    return new Model\BlogTable($tableGateway);
                },
                Model\BlogTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Blog());
                    return new TableGateway('blog', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }
    // Add this method:
    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\BlogController::class => function($container) {
                    return new Controller\BlogController(
                        $container->get(Model\BlogTable::class)
                    );
                },
            ],
        ];
    }
}