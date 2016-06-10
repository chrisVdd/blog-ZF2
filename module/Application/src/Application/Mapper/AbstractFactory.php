<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/06/2016
 * Time: 10:02
 */

namespace Application\Mapper;

use Application\ServiceManager\AbstractFactoryTrait;

use Zend\ServiceManager\AbstractFactoryInterface;

/**
 * Class AbstractFactory
 * @package Application\Mapper
 */
class AbstractFactory implements AbstractFactoryInterface
{

    use AbstractFactoryTrait;

    const FACTORY_KEY       = 'mapper';
    const FACTORY_NAMESPACE = __NAMESPACE__;

}