<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 25/05/2016
 * Time: 12:54
 */

namespace Application\Entity;

use ZfcUser\Entity\UserInterface;
use Doctrine\Orm\Mapping as ORM;

/**
 * Class User
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
abstract class User extends AbstractEntity implements UserInterface
{

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string")
     */
    protected $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string")
     */
    protected $lastname;

}