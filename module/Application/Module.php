<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Listener\User as UserListener;
use Application\ServiceManager\ServiceManagerAwareTrait;

use Zend\EventManager\EventManager;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\Application;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;

/**
 * Class Module
 * @package Admin
 */
class Module implements AutoloaderProviderInterface, ServiceManagerAwareInterface
{

    use ServiceManagerAwareTrait;

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
        $application = $e->getApplication();
        $config = $application->getConfig();

        /** @var EventManager $eventManager */
        $eventManager = $application->getEventManager();

        /** @var ServiceManager $serviceManager */
        $serviceManager = $e->getApplication()->getServiceManager();

        /** @var UserListener $userListener */
        $userListener = $serviceManager->get('application.listener.user');
        $userListener->attach($serviceManager->get('application.service.user')->getEventManager());

        $this->attachEvents($application);
    }

//    public function attachEvents(Application $application)
//    {
//        $serviceManager = $application->getServiceManager();
//        $eventManager = $application->getEventManager();
//
//        $eventManager->attach()
//    }
}
