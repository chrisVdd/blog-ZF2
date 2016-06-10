<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/06/2016
 * Time: 09:36
 */

namespace Application\Form;

use Application\ServiceManager\AbstractFactoryTrait;

use Zend\ServiceManager\AbstractFactoryInterface;

/**
 * Class AbstractFactory
 * @package Application\Form
 */
class AbstractFactory implements AbstractFactoryInterface
{

    use AbstractFactoryTrait;

    const FACTORY_KEY        = 'form';
    const FACTORY_NAMESPACE  = __NAMESPACE__;


}