<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 25/05/2016
 * Time: 16:02
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 * Class User
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends AbstractEntity implements
    EntityInputFilterInterface,
    InputFilterProviderInterface
{

    use EntityInputFilterTrait;

    /**
     * The user is not active
     */
    const STATUS_INACTIVE = 0;

    /**
     * The user is connected
     */
    const STATUS_ONLINE = 1;

    /**
     * The user is NOT connected
     */
    const STATUS_OFFLINE = 4;

    /**
     * The user is the admin
     */
    const ROLE_ADMIN = 'admin';

    /**
     * The user is
     */
    const ROLE_READER = 'reader';

    /**
     * @var string
     * @ORM\Column(name="username", type="string", nullable=false, unique=true)
     */
    protected $username;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", nullable=false, unique=true)
     */
    protected $email;

    /**
     * @var string
     * @ORM\Column(name="password", type="string", nullable=false)
     */
    protected $password;

    /**
     * @var string
     * @ORM\Column(name="firstName", type="string", nullable=false)
     */
    protected $firstName;

    /**
     * @var string
     * @ORM\Column(name="lastName", type="string", nullable=false)
     */
    protected $lastName;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    protected $status;

    /**
     * @var string
     * @ORM\Column(name="role", type="string", nullable=false)
     */
    protected $role;

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set username.
     *
     * @param $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email.
     *
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set password.
     *
     * @param $password
     * @return $this
     */
    public function setPassword($password)
    {
        $password = $this->filter('password', $password);
        $this->password = (new \Zend\Crypt\Password\Bcrypt())->create($password);

        return $this;
    }

    /**
     * Get firstName.
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set firstName.
     *
     * @param $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set lastName.
     *
     * @param $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status.
     *
     * @param $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Set role.
     *
     * @param $role
     * @return $this
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return (self::ROLE_ADMIN == $this->getRole());
    }

    /**
     * @return bool
     */
    public function isUser()
    {
        return (self::ROLE_READER == $this->getRole());
    }

    /**
     * @return array
     */
    public static function getRoles()
    {
        return
        [
            static::ROLE_ADMIN,
            static::ROLE_READER
        ];
    }

    /**
     * User constructor - set default values
     */
    public function __construct()
    {
        $this->createDate = new \DateTime();
        $this->updateDate = new \DateTime();
        $this->status = self::STATUS_INACTIVE;
    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return
        [
            'id'        => $this->getId(),
            'username'  => $this->getUsername(),
            'email'     => $this->getEmail(),
            'password'  => $this->getPassword(),
            'firstName' => $this->getFirstName(),
            'lastName'  => $this->getLastName(),
            'status'    => $this->getStatus(),
            'role'      => $this->getRole()
        ];
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        $specifications =
        [
            [
                'name'     => 'id',
                'required' => false,
            ],
            [
                'name'     => 'username',
                'required' => true,
            ],
            [
                'name'     => 'email',
                'required' => true,
            ],
            [
                'name'     => 'password',
                'required' => true,
            ],
            [
                'name'     => 'firstName',
                'required' => true,
            ],
            [
                'name'     => 'lastName',
                'required' => true,
            ],
        ];

        return $specifications;
    }

}