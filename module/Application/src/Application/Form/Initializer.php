<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/06/2016
 * Time: 09:53
 */

namespace Application\Form;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class Initializer
 * @package Application\Form
 */
class Initializer implements InitializerInterface
{

    /**
     * @param $instance
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof ServiceLocatorAwareInterface) {
            $instance->setServiceLocator($serviceLocator);
        }

        if ( $instance instanceof HydratableEntityInterface ) {

            $instance->setObjectManager(
                $serviceLocator->getServiceLocator()->get('entity_manager')
            );

            $entityClass = $instance->getEntityClassName();
            $instance->setObject(new $entityClass);

            $hydratorClass = $instance->getHydratorClassName();

            if ( 'DoctrineObject' === $hydratorClass ) {

                /** @var string $hydratorClass */
                $hydratorClass = '\DoctrineModule\Stdlib\Hydrator\DoctrineObject';

                $hydrator = new $hydratorClass($instance->getObjectManager(), get_class($instance->getObject()));

                $instance->setHydrator($hydrator);
            }

            return $instance;
        }
    }

}