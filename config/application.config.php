<?php
/**
 * Configuration file changed by LosBase
 * The previous configuration file is stored in application.config.old
 */
return array(
    'modules' => array(
        'Application',
        'Admin',
        'ZFTool',
        'ZendDeveloperTools',
        'DoctrineModule',
        'DoctrineORMModule',
        'ZfcBase',
        'ZfcUser',
        'ZfcUserDoctrineORM',
        'LosBase',
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor',
        ),
        'config_glob_paths' => array(
            'config/autoload/{{,*.}global,{,*.}local}.php',
        ),
    ),
    'service_manager' => array(
        'aliases' => array(
            'entity_manager' => 'Doctrine\ORM\EntityManager',
        ),
    ),
);
