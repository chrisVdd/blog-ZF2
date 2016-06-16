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
        'event_manager' =>
        [
            'orm_default' =>
            [
                'subscribers' =>
                [
                    'Gedmo\Tree\TreeListener',
                    'Gedmo\Timestampable\TimestampableListener',
                    'Gedmo\Sluggable\SluggableListener',
                    'Gedmo\Loggable\LoggableListener',
                    'Gedmo\Sortable\SortableListener'
                ]
            ]
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
//                'objectManager' => 'Doctrine\ORM\Entity\Manager',
                'objectManager' => 'entity_manager',
                'identityClass' => 'Application\Entity\User',
                'identityProperty' => 'username',
                'credentialProperty' => 'password',
            ],
        ],

    ],
];