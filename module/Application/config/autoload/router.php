<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 25/05/2016
 * Time: 10:20
 */

return
[
    'router' =>
    [
        'routes' =>
        [
            'home' =>
            [
                'type' => 'Literal',
                'options' =>
                [
                    'route'    => '/',
                    'defaults' =>
                    [
                        'controller' => 'application/index',
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' =>
                [
                    'user' =>
                    [
                        'type' => 'Segment',
                        'options' =>
                        [
                            'route' => 'user[/:action][/:id]',
                            'defaults' =>
                            [
                                // TODO - change the default action
                                'controller' => 'application/user',
                                'action'     => 'index',
                            ],
                            'constraints' =>
                            [
                                'action' => 'index|register|login|update|profile',
                                'id'     => '[0-9]+'
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];



//    // LITERAL ROUTE EXEMPLE
//    'controller' =>
//    [
//        'IndexController'   => 'Application\Controller\IndexController',
//        'AboutMeController' => 'Application\Controller\AboutMeController',
//        'ProfileController' => 'Application\Controller\ProfileController',
//        'AlbumController'   => 'Application\Controller\AlbumController',
//        'ProduitController' => 'Application\Controller\ProduitController',
//    ],
//    'router' =>
//    [
//        'routes' =>
//        [
//            'home' =>
//            [
//                'type' => 'literal',
//                'options' =>
//                [
//                    'routes' => '/accueil',
//                    'defaults' =>
//                    [
//                        // Use the alias key
//                        'controller' => 'IndexController',
//                        'action'     => 'index',
//                    ],
//                ],
//            ],
//            'aboutme' =>
//            [
//                'type' => 'Literal',
//                'options' =>
//                [
//                    'routes' => '/about-me',
//                    'defaults' =>
//                    [
//                        // Use the alias key
//                        'controller' => 'AboutController',
//                        'action'     => 'aboutme',
//                    ],
//                ],
//            ],
//            'profile' =>
//            [
//                'type' => 'Segment',
//                'options' =>
//                [
//                    'route' => '/profile/:name',
//                    'constraints' =>
//                    [
//                        'name' => '[a-zA-Z]+',
//                    ],
//                    'defaults' =>
//                    [
//                        'controller' => 'ProfileController',
//                        'action'     => 'index',
//                    ],
//                ],
//            ],
//            'album' =>
//            [
//                'type' => 'literal',
//                'options' =>
//                [
//                    'route' => '/album[/:id]',
//                    'constraints' =>
//                    [
//                        'id' => '[0-9]+',
//                    ],
//                    'defaults' =>
//                    [
//                        'controller' => 'AlbumController',
//                        'action' => 'index',
//                        'id' => 1,
//                    ],
//                ],
//            ],
//            'produit' =>
//            [
//                'type' => 'literal',
//                'options' =>
//                [
//                    'route' => '/produit[/:action/:id]',
//                    'constraints' =>
//                    [
//                        'action' => '[a-z]+',
//                        'id'     => '[0-9]+',
//                    ],
//                    'defaults' =>
//                    [
//                        'controller' => 'ProduitController',
//                        'action'     => 'index',
//                    ],
//                ],
//            ],
//        ],
//    ],
