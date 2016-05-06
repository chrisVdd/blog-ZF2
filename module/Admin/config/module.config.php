<?php
return [
    'controllers' => [
        'invokables' => [
            'Admin\Controller\Crud' => 'Admin\Controller\CrudController',
        ],
    ],
    'router' => [
        'routes' => [
            'admin' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/admin',
                    'defaults' => [
                        'controller' => 'Admin\Controller\Crud',
                        'action' => 'list',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'list' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/list',
                            'defaults' => [
                                'controller' => 'Admin\Controller\Crud',
                                'action' => 'list',
                            ],
                        ],
                    ],
                    'view' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/view[/:id]',
                            'constraints' => [
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => 'Admin\Controller\Crud',
                                'action' => 'view',
                                'id' => 0,
                            ],
                        ],
                    ],
                    'add' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/add',
                            'defaults' => [
                                'controller' => 'Admin\Controller\Crud',
                                'action' => 'add',
                            ],
                        ],
                    ],
                    'edit' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/edit[/:id]',
                            'constraints' => [
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => 'Admin\Controller\Crud',
                                'action' => 'edit',
                                'id' => 0,
                            ],
                        ],
                    ],
                    'delete' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/delete[/:id]',
                            'constraints' => [
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => 'Admin\Controller\Crud',
                                'action' => 'delete',
                                'id' => 0,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'Admin' => __DIR__.'/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            'Admin_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    __DIR__.'/../src/Admin/Entity',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'Admin\Entity' => 'Admin_driver',
                ],
            ],
        ],
    ],
    'navigation' => [
        'default' => [
            'Crud' => [
                'pages' => [
                    'admin' => [
                        'label' => 'Admin',
                        'route' => 'admin/list',
                        'pages' => [
                            'list' => [
                                'label' => 'List',
                                'route' => 'admin/list',
                            ],
                            'view' => [
                                'label' => 'View',
                                'route' => 'admin/view',
                            ],
                            'add' => [
                                'label' => 'Add',
                                'route' => 'admin/add',
                            ],
                            'edit' => [
                                'label' => 'Edit',
                                'route' => 'admin/edit',
                            ],
                            'delete' => [
                                'label' => 'Delete',
                                'route' => 'admin/delete',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ]
];
