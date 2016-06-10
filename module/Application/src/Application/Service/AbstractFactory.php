<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/06/2016
 * Time: 11:18
 */

namespace Application\Service;

use Application\ServiceManager\AbstractFactoryTrait;
use Zend\ServiceManager\AbstractFactoryInterface;

/**
 * Class AbstractFactory
 * @package Application\Service
 */
class AbstractFactory implements AbstractFactoryInterface
{
    use AbstractFactoryTrait;

    const FACTORY_KEY       = 'service';
    const FACTORY_NAMESPACE = __NAMESPACE__;
}