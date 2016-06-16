<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 25/05/2016
 * Time: 10:20
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
        'template_map' =>
        [
            'admin/layout'            => __DIR__ . '/../../../Admin/view/layout/admin-layout.phtml',
            'layout/layout'           => __DIR__ . '/../../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../../view/error/index.phtml',
        ],
        'template_path_stack' =>
        [
            'application' => __DIR__ . '/../view',
            'admin'       => __DIR__ . '/../../Admin/view',
        ],
    ],
    'module_layouts' =>
    [
        'Application' => 'layout/layout',
        'Admin'       => 'admin/layout',
    ]
];