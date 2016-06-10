<?php

namespace Application\Initializer;

use Application\Mapper\DoctrineInterface;
use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class Mapper
 * @package Application\Initializer
 */
class Mapper implements InitializerInterface
{
    /**
     * @param $instance
     * @param ServiceLocatorInterface $locator
     * @return mixed
     */
    public function initialize($instance, ServiceLocatorInterface $locator)
    {
        if ($instance instanceof DoctrineInterface) {

            $entityClassName = str_replace('Mapper', 'Entity', get_class($instance));

            if (class_exists($entityClassName)){
                $instance->setEntityClassName($entityClassName);
            }
        }

        return $instance;
    }

}