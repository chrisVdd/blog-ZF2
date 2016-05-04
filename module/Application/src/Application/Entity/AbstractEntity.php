<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 04/05/2016
 * Time: 12:41
 */

namespace Application\Entity;

/**
 * Class AbstractEntity
 * @package Application\Entity
 */
abstract class AbstractEntity
{

    /**
     * @return mixed
     */
    public function getArrayCopy() {

        return get_object_vars($this);
    }

    /**
     * @param array $options
     */
    public function exchangeArray(array $options) {

        /** @var array $methods */
        $methods = get_class_methods($this);

        foreach ($options as $key => $value) {

            /** @var string $method */
            $method = $this->getSetterMethod($key);

            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @param $propertyName
     * @return string
     */
    private function getSetterMethod($propertyName) {

        return "set" . str_replace(' ', '', ucwords(str_replace('_', ' ', $propertyName)));

    }

}