<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 04/05/2016
 * Time: 12:41
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractEntity
 * @package Application\Entity
 */
abstract class AbstractEntity
{

    /**
     * Primary Identifier
     *
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned" = true})
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createDate", type="datetime")
     */
    protected $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateDate", type="datetime")
     */
    protected $updateDate;

    /**
     * @param $id
     * @return $this
     */
    public function setId($id) {

        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId() {

        return $this->id;
    }

    /**
     * @param $createDate
     * @return $this
     */
    public function setCreateDate($createDate) {

        $this->createDate = $createDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreateDate() {

        return $this->createDate;
    }

    /**
     * @param $updateDate
     * @return $this
     */
    public function setUpdateDate($updateDate) {

        $this->updateDate = $updateDate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateDate() {

        return $this->updateDate;

    }

    /**
     * @return array
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
}