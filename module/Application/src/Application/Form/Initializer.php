<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 08/06/2016
 * Time: 21:51
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

    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof ServiceLocatorAwareInterface) {

            $instance->setServiceLocator($serviceManager);
        }

        if ($instance instanceof HydratableEntityInterface)
        {
            $instance->setObjectManager(
                $serviceLocator->getServiceLocator()->get('entity_manager')
            );

            $entityClass = $instance->getEntityClassName();
            $instance->setObjectManager(new $entityClass);

            $hydratorClass = $instance->getHydratorClassName();

            if ( 'DoctrineObject' === $hydratorClass ) {
                
                $hydratorClass = '\DoctrineModule\Stdlib\Hydrator\DoctrineObject';
                
                $hydrator      = new $hydratorClass(
                    $instance->getObjectManager(),
                    get_class($instance->getObject())
                );
                $instance->setHydrator($hydrator);
            }
        }

        return $instance;
    }

}