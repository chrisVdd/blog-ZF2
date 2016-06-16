<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/06/2016
 * Time: 09:18
 */

namespace Application\Entity;

use Application\ServiceManager\AbstractFactoryTrait;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Filter\Word\DashToCamelCase;

/**
 * Class AbstractFactory
 * @package Application\Entity
 */
class AbstractFactory implements AbstractFactoryInterface
{

    use AbstractFactoryTrait;

    const FACTORY_KEY       = 'entity';
    const FACTORY_NAMESPACE = __NAMESPACE__;

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return array|object
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $classParts    = explode('.', $requestedName);
        $classParts[0] = static::FACTORY_NAMESPACE;

        $className = array_reduce($classParts, function(&$result, $val){
            $filter = new DashToCamelCase();
            return $result .= '\\'.ucfirst($filter->filter($val));
        });

        $filter = new DashToCamelCase();
        $className = $filter->filter($className);

        $serviceLocator->setInvokableClass($requestedName, $className);
        $serviceLocator->setShared($requestedName, false);

        return $serviceLocator->get($requestedName);
    }

}