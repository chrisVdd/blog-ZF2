<?php
/**
 * Configuration file changed by LosBase
 * The previous configuration file is stored in application.config.old
 */
return
[
    'modules' =>
    [
        'Application',
        'Admin',
        'ZFTool',
        'ZendDeveloperTools',
        'DoctrineModule',
        'DoctrineORMModule',
        'LosBase',
    ],
    'module_listener_options' =>
    [
        'module_paths' =>
        [
            './module',
            './vendor',
        ],
        'config_glob_paths' =>
        [
            'config/autoload/{,*.}{global,local,development}.php',
        ],
    ],
    'service_manager' =>
    [
        'aliases' =>
        [
            'entity_manager' => 'Doctrine\ORM\EntityManager',
        ],
    ],
];
