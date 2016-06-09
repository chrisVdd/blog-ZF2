<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 25/05/2016
 * Time: 16:02
 */

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package Application\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
abstract class User extends AbstractEntity
{

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
     * @var string
     *
     * @ORM\Column(name="username", type="string")
     */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    protected $email;

    /**
     * @var string
     * @ORM\Column(name="password", type="string")
     */
    protected $password;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string")
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string")
     */
    protected $lastName;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    protected $status;

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
        $this->password = $password;
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
    public function setDisplayName($firstName)
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
     * User constructor - set default values
     */
    public function __construct()
    {
        $this->createDate = new \DateTime();
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
        ];
    }

    public function getInputFilterSpecification()
    {
        return
        [
            [
                'name'     => 'id',
                'required' => false,
            ],
            [
                'name' => 'username',
                'required' => true,
                'filters'   =>
                [
                    ['name' => 'StringTrim'],
                ],
                'validators' =>
                [
                    [
                        'name' => 'StringLength',
                        'options' =>
                        [
                            'min' => 3,
                            'max' => 30
                        ],
                    ],
                ],
                [
                    'name' => 'firstName',
                    'required' => true,
                    'filters'   =>
                    [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim'],
                    ],
                    'validators' =>
                    [
                        [
                            'name' => 'StringLength',
                            'options' => ['min' => 0]
                        ]
                    ],
                ],
                [
                    'name' => 'lastName',
                    'required' => true,
                    'filters'   =>
                    [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim'],
                    ],
                    'validators' =>
                    [
                        [
                            'name' => 'StringLength',
                            'options' => ['min' => 0]
                        ]
                    ],
                ],
                [
                    'name' => 'email',
                    'required' => true,
                    'filters'   =>
                    [
                        ['name' => 'StringTrim'],
                    ],
                    'validators' =>
                    [
                        [
                            'name' => 'EmailAdress',
                        ]
                    ],
                ],
                [
                    'name' => 'password',
                    'filters' =>
                    [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim']
                    ],
                    'validators' =>
                    [
                        [
                            'name'    => 'StringLength',
                            'options' => ['min' => 3]
                        ],
                    ],
                ],
                [
                    'name'       => 'status',
                    'required'   => true,
                    'filters'    =>
                    [
                        ['name' => 'Int'],
                    ],
                    'validators' => [
                        [
                            'name' => 'InArray',
                            'options' =>
                            [
                                'haystack' =>
                                [
                                    static::STATUS_INACTIVE,
                                    static::STATUS_OFFLINE,
                                    static::STATUS_ONLINE,
                                ],
                            ],
                        ],
                    ],
                ],
            ],

        ];
    }


}