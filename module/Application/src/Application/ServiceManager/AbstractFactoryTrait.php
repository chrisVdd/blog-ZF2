<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/06/2016
 * Time: 09:25
 */

namespace Application\ServiceManager;

use Zend\Filter\Word\UnderscoreToCamelCase;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class AbstractFactoryTrait
 * @package Application\ServiceManager
 */
trait AbstractFactoryTrait
{

    /**
     * This method define if we can create a service, with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return bool
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        if (!defined('static::FACTORY_KEY') && !defined('static::FACTORY_NAMESPACE')) {
            throw new \RuntimeException(sprintf(
                '%s Abstract factory must define FACTORY_KEY and FACTORY_NAMESPACE constants 
                 in order to inilialize services', get_class($this)
            ));
        }

        return strpos($requestedName, static::FACTORY_KEY . '.') === 0;
    }

    /**
     * This method create a service, with name.
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return mixed
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $classParts     = explode('.', $requestedName);
        $classParts[0]  = static::FACTORY_NAMESPACE;

        $className = array_reduce($classParts, function ($result, $value) {
            return $result .= '\\' . ucfirst($value);
        });

        $filter = new UnderscoreToCamelCase();
        $className = $filter->filter($className);

        return new $className;
    }

}