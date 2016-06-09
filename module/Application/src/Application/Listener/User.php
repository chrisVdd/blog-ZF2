<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 07/06/2016
 * Time: 09:22
 */

namespace Application\Listener;

use Application\Service\User    as UserService;
use Application\Entity\User     as UserEntity;

use Zend\EventManager\Event;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

/**
 * Class User
 * @package Application\Listener
 */
class User implements ListenerAggregateInterface, ServiceLocatorAwareInterface
{
    use ListenerAggregateTrait;
    use ServiceLocatorAwareTrait;

    /**
     * @param EventManagerInterface $events
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(UserService::EVENT_USER_CREATE, [$this, 'onInsertUser'], 100);
        $this->listeners[] = $events->attach(UserService::EVENT_USER_CREATE, [$this, 'onNotifyUser'], -100);
    }

    /**
     * @param Event $event
     */
    public function onInsertUser(Event $event)
    {
        /** @var UserEntity $user */
        $user = $event->getTarget();

        /** @var UserService $userService */
        $userService = $this->getServiceLocator()->get('application.service.user');
        $userService->insertUser($user);
    }

    /**
     * @param Event $event
     */
    public function onNotifyUser(Event $event)
    {
        /** @var UserEntity $user */
        $user = $event->getTarget();

        /** @var UserService $userService */
        $userService = $this->getServiceLocator()->get('application.service.user');
        $userService->notifyUser($user);
    }
    
    
}