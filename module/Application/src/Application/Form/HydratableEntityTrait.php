<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 26/05/2016
 * Time: 13:13
 */

namespace Application\Form;

use DoctrineModule\Persistence\ProvidesObjectManager;

/**
 * Class HydratableEntityTrait
 * @package Application\Form
 */
trait HydratableEntityTrait
{

    use ProvidesObjectManager;

    /**
     * @return mixed
     */
    public function getEntityClassName()
    {
        return $this->entityName;
    }

    /**
     * @return string
     */
    public function getHydratorClassName()
    {
        if (! property_exists($this, 'hydratorName')) {

            return 'DoctrineObject';
        }

        return $this->hydratorName;
    }

}