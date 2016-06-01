<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 26/05/2016
 * Time: 13:11
 */

namespace Application\Form;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;

/**
 * Interface HydratableEntityInterface
 * @package Application\Form
 */
interface HydratableEntityInterface extends ObjectManagerAwareInterface
{

    public function getEntityClassName();

    public function getHydratorClassName();

}