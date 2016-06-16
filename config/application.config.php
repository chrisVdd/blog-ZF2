<?php
/**
 * Configuration file changed by LosBase
 * The previous configuration file is stored in application.config.old
 */
return
[
    'modules' =>
    [
        'ZFTool',
        'ZendDeveloperTools',
        'DoctrineModule',
        'DoctrineORMModule',
        'EdpModuleLayouts',

    // MY MODULES
        
        'Application',
        'Admin',
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
