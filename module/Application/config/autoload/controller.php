<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 25/05/2016
 * Time: 10:20
 */

return
[
    'controllers' =>
    [
        'invokables' =>
        [
            'application/index' => 'Application\Controller\IndexController',
            'application/user'  => 'Application\Controller\UserController',
            'application/post'  => 'Application\Controller\PostController',
        ],
    ],
];