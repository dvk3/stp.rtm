<?php
return array(
    'router' => array(
        'routes' => array(
            'dashboard' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/:configName[/theme/:theme]',
                    'constraints' => array(
                        'configName' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'theme' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Dashboard\Controller\Dashboard',
                        'action'     => 'dashboard',
                    ),
                ),
            ),
            'addMessage' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/:configName/:widgetId',
                    'constraints' => array(
                        'configName' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'widgetId' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Dashboard\Controller\Dashboard',
                        'action'     => 'addMessage',
                    ),
                ),
            ),
            'lpServer' => array(
                'type' => 'Segment',
                'options' => array(
                    'route'    => '/resources/:configName/:id[/:oldHash]',
                    'constraints' => array(
                        'configName' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Dashboard\Controller\LongPollingController',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Dashboard\Controller\Dashboard' => 'Dashboard\Controller\DashboardController',
            'Dashboard\Controller\LongPollingController' => 'Dashboard\Controller\LongPollingController',
            'Dashboard\Controller\ApiController' => 'Dashboard\Controller\ApiController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'dashboard' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    'view_helpers' => array(
        'invokables'=> array(
            'createBootstrapRows' => 'Dashboard\View\Helper\BootstrapRowHelper',
        )
    ),
    'dashboardCache' => array(
        'ttl' => 3600 * 24 * 7, // 7 days
        'namespace' => 'rtm_dashboard',
        'key_pattern' => null,
        'readable'  => true,
        'writable' => true,
        'servers' => 'localhost',
    ),
);
