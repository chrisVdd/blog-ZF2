<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 04/05/2016
 * Time: 12:41
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * Class AbstractEntity
 * @package Application\Entity
 */
abstract class AbstractEntity implements ArraySerializableInterface
{

    /**
     * Primary Identifier
     *
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned" = true})
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer
     * @access public
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
     * @param int $id
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
     * @param $offset
     * @return bool
     */
    public function offsetExists ($offset)
    {
        $value = null;
        $offset = ucfirst($offset);
        if (method_exists($this, 'get'.$offset)) {
            $value = $this->{"get$offset"}();
        }

        return $value !== null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return $this|bool
     */
    public function offsetSet ($offset, $value)
    {
        $offset = ucfirst($offset);

        if (method_exists($this, 'set'.ucfirst($offset)) && !is_null($value))
        {
            $this->{"set$offset"}($value);
            return $this;

        } elseif ($offset == "_embedded") {

            foreach ($value as $key => $val) {
                
                $this->offsetSet($key, $val);
            }
        }
        return false;
    }

    /**
     * @param $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        if (method_exists($this, 'get'.ucfirst($offset))) {
            return $this->{"get$offset"}();
        }
    }

    /**
     * @param $offset
     */
    public function offsetUnset($offset)
    {
        $this->offsetSet($offset, null);
    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * (non-PHPdoc)
     * @see \Zend\Stdlib\ArraySerializableInterface::exchangeArray()
     */
    public function exchangeArray(array $array)
    {
        return $this->setFromArray($array);
    }

    /**
     * @param $data
     * @return $this
     * @throws \Exception
     */
    public function setFromArray($data)
    {

        if (is_object($data))
        {
            if ($data instanceof \ArrayObject)
            {
                $data = $data->getArrayCopy();
            }
            elseif (is_callable([$data, 'toArray']))
            {
                $data = $data->toArray();
            }
            elseif (! $data instanceof \Iterator)
            {
                throw new \Exception("Model should be instantiated with an array or an Iterable object");
            }
        }
        elseif (! is_array($data))
        {
            throw new \Exception("Model should be instantiated with an array or an Iterable object");
        }

        foreach ($data as $key => $value)
        {
            if(is_array($value) && isset($value['date']) && isset($value['timezone_type']) && isset($value['timezone'])) {
                $this->offsetSet($key, new \DateTime($value['date'], new \DateTimeZone($value['timezone'])));
            }
            else {
                $this->offsetSet($key, $value);
            }
        }

        return $this;
    }

}