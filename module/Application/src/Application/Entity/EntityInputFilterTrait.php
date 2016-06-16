<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 13/06/2016
 * Time: 16:19
 */

namespace Application\Entity;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareTrait;

/**
 * Class EntityInputFilterTrait
 * @package Application\Entity
 */
trait EntityInputFilterTrait
{
    use InputFilterAwareTrait;

    /**
     * Apply filters and validations on the $name field
     *
     * @param $name     : Key to validate
     * @param $value    : Value to filter|validate
     * @return mixed    : Filtered value
     */
    public function filter($name, $value)
    {
        $inputFilter = $this->getInputFilter();

        if ($inputFilter->has($name)) {

            $filter = $inputFilter->get($name);
            $filter->setValue($value);

            if (!$filter->isValid()) {
                throw new \InvalidArgumentException(
                    implode('; ', array_merge(['field: ' . $name], $filter->getMessages()))
                );
            }

            $value = $filter->getValue();
        }

        return $value;
    }

    /**
     * If input filter is not set, we instanciate a new one, and inject the array
     * of definitions if returned by getInputFilterData()
     *
     * @return InputFilter|InputFilterInterface
     */
    public function getInputFilter()
    {
        if (null === $this->inputFilter) {

            $this->inputFilter = new InputFilter();

            if ( ($fields = $this->getInputFilterSpecification()) and is_array($fields) ) {

                foreach ($fields as $definition) {
                    $this->inputFilter->add($definition);
                }
            }
        }

        return $this->inputFilter;
    }
}