<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 13/06/2016
 * Time: 16:19
 */

namespace Application\Entity;

use Zend\InputFilter\InputFilterAwareInterface;

/**
 * Interface EntityInputFilterInterface
 * @package Application\Entity
 */
interface EntityInputFilterInterface extends InputFilterAwareInterface
{

    /**
     * Check if the input is valid or not, and return the filtered value.
     *
     * @param $name     : Key to validate
     * @param $value    : Value to filter and validate
     * @return mixed    = Filtered value
     */
    public function filter($name, $value);

}