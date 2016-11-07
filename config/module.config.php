<?php

return array(
    'router' => array(
        'routes' => array(
            'swagger-resources' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/api/docs',
                    'defaults' => array(
                        'controller' => 'SwaggerModule\Controller\Documentation',
                        'action'     => 'display'
                    )
                )
            ),

            'swagger-resource-detail' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/api/docs/:resource',
                    'defaults' => array(
                        'controller' => 'SwaggerModule\Controller\Documentation',
                        'action'     => 'details'
                    )
                )
            )
        )
    ),

    'controllers' => array(
        'factories' => array(
            'SwaggerModule\Controller\Documentation' => function(\Zend\ServiceManager\ServiceManager $serviceManager) {
                $controller = new SwaggerModule\Controller\DocumentationController();
                $swagger = $serviceManager->get('Swagger\Annotations\Swagger');
                $controller->setSwagger($swagger);
                return $controller;
            }
        ),
    ),

    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy'
        ),
    ),
);
