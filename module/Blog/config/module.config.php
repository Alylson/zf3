<?php

namespace Blog;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Blog\Controller\BlogController;

return[
	// 'controllers' => [
	// 	'factories' => [
	// 		controller\BlogController::class => InvokableFactory::class,
	// 	],
	// ],
	'router' => [
		'routes' => [
			'blog' => [
				'type' => 'Segment',
					'options' => [
						'route' => '/blog[/:action[/:id]]',
						'contraints' => [
							'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
							'id' => '[0-9]+',
						],
						'defaults' => [
							'controller' => Controller\BlogController::class,
							//'controller' => BlogController::class,
							'action' => 'index',
						],
					],
			],
		],
	],
	'view_manager' => [
		'template_path_stack' => [
			'blog' =>__DIR__."/../view",
		],
	],
];