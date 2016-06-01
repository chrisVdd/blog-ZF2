<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

/**
 * Class Module
 * @package Admin
 */
class Module implements AutoloaderProviderInterface
{

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return
        [
            'Zend\Loader\StandardAutoloader' =>
            [
                'namespaces' =>
                [
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/', __NAMESPACE__)
                ]
            ]
        ];
    }

    /**
     * Method used to get the config files
     *
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
