<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 25/05/2016
 * Time: 10:16
 */

return
[
    'view_manager' =>
    [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map'             =>
        [
            'layout/admin' => __DIR__ . '/../../view/layout/admin-layout.phtml',
            'admin/index'  => __DIR__ . '/../../view/admin/home/index.phtml',
            'error/404'    => __DIR__ . '/../../view/error/404.phtml',
            'error/index'  => __DIR__ . '/../../view/error/index.phtml'
        ],
        'template_path_stack' =>
        [
                __DIR__ . '/../../view',
        ],
    ],
    'module_layouts' =>
    [
        'Admin'       => 'layout/admin',
    ]
];