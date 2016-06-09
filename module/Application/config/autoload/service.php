<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 25/05/2016
 * Time: 10:25
 */

return
[
    'service_manager' =>
    [
        'abstract_factories' =>
        [
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ],
        'factories' =>
        [
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ],
        'invokables' =>
        [
            'application.service.user'  => 'Application\Service\User',
            'application.mapper.user'   => 'Application\Mapper\User',
            'application.listener.user' => 'Application\Listener\User',
        ],
        'initializers' =>
        [
            'mapper.initializer' => 'Application\Initializer\Mapper',
        ],
    ],
];