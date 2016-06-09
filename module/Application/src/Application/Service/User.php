<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 01/06/2016
 * Time: 13:07
 */

namespace Application\Service;

use Zend\Di\ServiceLocator;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\Mail;

use Doctrine\ORM\EntityManager as EntityManager;

use Application\Entity\User as UserEntity;

/**
 * Class User
 * @package Application\Service
 */
class User implements ServiceLocatorAwareInterface, EventManagerAwareInterface
{

    use ServiceLocatorAwareTrait;
    use EventManagerAwareTrait;

    const EVENT_USER_CREATE = 'user-create';

    /**
     * Create a new User in DB
     *
     * @param UserEntity $user
     */
    public function createUser(UserEntity $user)
    {
        $this->getEventManager()->trigger(self::EVENT_USER_CREATE, $user);
    }

    /**
     * Insert User in DB
     *
     * @param UserEntity $user
     * @return UserEntity
     */
    public function insertUser(UserEntity $user)
    {
        /** @var EntityManager $entityManager */
        $entityManager = $this->getServiceLocator()->get('entity_manager');

        $entityManager->persist($user);
        $entityManager->flush();

        return $user;
    }

    /**
     * @param UserEntity $user
     */
    public function notifyUser(UserEntity $user)
    {
        $mail = new Mail\Message();
        $mail->setBody('Register on my blog');

        $mail->setFrom('christina.ZFblog@gmail.com');
        $mail->addTo('test@test.com', 'Dan');
        $mail->setSubject('Your registration' . ' ' . $user->getUsername());

        $transport = new Mail\Transport\Sendmail();
        $transport->send($mail);
    }


}