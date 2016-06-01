<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 25/05/2016
 * Time: 10:26
 */

return
[
    'doctrine' =>
    [
        'driver' =>
        [
            'application_driver' =>
            [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' =>
                [
                    __DIR__ . '/../../src/Application/Entity'
                ],
            ],
            'orm_default' =>
            [
                'drivers' =>
                [
                    'Application\Entity' => 'application_driver',
                ],
            ],
        ],
        'configuration' =>
        [
            'orm_default' =>
            [
                'generate_proxies' => true,
            ],
        ],
        'authentication' =>
        [
            'orm_default' =>
            [
                'object_manager'      => 'Doctrine\ORM\EntityManager',
                'identity_class'      => 'Application\Entity\User',
                'identity_property'   => 'username',
                'credential_property' => 'password',
                'credential_callable' => 'Application\Service\UserService::verifyHashedPassword',
            ],
        ],
    ],
];