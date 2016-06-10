<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/06/2016
 * Time: 09:18
 */

namespace Application\Entity;

use Zend\ServiceManager\AbstractFactoryInterface;

class AbstractFactory implements AbstractFactoryInterface
{

    use AbstractFactoryTrait;

    const FACTORY_KEY       = 'entity';
    const FACTORY_NAMESPACE = __NAMESPACE__;

}