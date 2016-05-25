<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 25/05/2016
 * Time: 10:13
 */

return
[
    'router' =>
    [
        'routes' =>
        [
            'home' =>
            [
                'child_routes' =>
                [
                    'admin' =>
                    [
                        'type' => 'Literal',
                        'options' =>
                        [
                            'route' => 'admin',
                            'defaults' =>
                            [
                                'controller' => 'Admin\Controller\Home',
                                'action'     => 'index',
                            ],
                        ],
                        'may_terminate' => true,
                    ],
                ],
            ],
        ],
    ],
];