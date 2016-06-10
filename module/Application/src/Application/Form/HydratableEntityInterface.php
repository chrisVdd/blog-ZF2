<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/06/2016
 * Time: 09:46
 */

namespace Application\Form;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;

/**
 * Interface HydratableEntityInterface
 * @package Application\Form
 */
interface HydratableEntityInterface extends ObjectManagerAwareInterface
{
    /**
     * @return mixed
     */
    public function getEntityClassName();

    /**
     * @return mixed
     */
    public function getHydratorClassName();
}