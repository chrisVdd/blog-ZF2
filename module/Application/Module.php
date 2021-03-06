<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Listener\User   as UserListener;

use Zend\EventManager\EventManager;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;


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
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
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

    /**
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        /** @var ServiceManager $serviceManager */
        $serviceManager = $e->getApplication()->getServiceManager();

        /** @var EventManager $eventManager */
        $eventManager = $e->getApplication()->getEventManager();

        /** @var UserListener $userListener */
        $userListener = $serviceManager->get('application.listener.user');
        $userListener->attach($serviceManager->get('application.service.user')->getEventManager());

//        $eventManager->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
//
//            $controller = $e->getTarget();
//
//            $controllerClass = get_class($controller);
//
//            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
//
//            $config = $e->getApplication()->getServiceManager()->get('config');
//
//            if (isset($config['module_layouts'][$moduleNamespace])) {
//                $controller->layout($config['module_layouts'][$moduleNamespace]);
//            }
//        }, 100);
//
//        $moduleRouterListener = new ModuleRouteListener();
//        $moduleRouterListener->attach($eventManager);
    }

    /**
     * @return array
     */
    public function getServiceConfig()
    {
        return
        [
            'factories' =>
            [
                'Zend\Authentication\AuthenticationService' => function($serviceManager) {

                    return $serviceManager->get('doctrine.authenticationservice.orm_default');
                }
            ]
        ];
    }
}
