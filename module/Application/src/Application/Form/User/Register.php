<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 25/05/2016
 * Time: 16:54
 */

namespace Application\Form\User;

use Application\Entity\User;
use Application\Form\HydratableEntityInterface;
use Application\Form\HydratableEntityTrait;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

/**
 * Class Register
 * @package Application\Form\User
 */
class Register extends Form implements
    HydratableEntityInterface,
    InputFilterProviderInterface,
    ServiceLocatorAwareInterface
{
    /** @var string $entityName */
    protected $entityName = 'Application\Entity\User';

    use HydratableEntityTrait;
    use ServiceLocatorAwareTrait;

    public function init()
    {

        $this
            ->setAttributes(['class' => 'form-horizontal'])
            ->add([
                    'name' => 'username',
                    'type' => 'text',
                    'attributes' =>
                    [
                        'required'    => true,
                        'class'       => 'col-sm-10',
                    ],
                    'options' =>
                    [
                        'label' => 'Username',
                        'label_attributes' =>
                        [
                            'class' => 'col-sm-2 control-label'
                        ]
                    ]
            ])
            ->add([
                    'name' => 'email',
                    'type' => 'email',
                    'attributes' =>
                    [
                        'required'    => true,
                        'class'       => 'col-sm-10',
                    ],
                    'options' =>
                    [
                        'label' => 'Email',
                        'label_attributes' =>
                        [
                            'class' => 'col-sm-2 control-label'
                        ]
                    ]
            ])
            ->add([
                    'name'       => 'firstName',
                    'type'       => 'text',
                    'attributes' =>
                    [
                        'required'    => true,
                        'class'       => 'col-sm-10',
                    ],
                    'options' =>
                    [
                        'label' => 'FirstName',
                        'label_attributes' =>
                        [
                            'class' => 'col-sm-2 control-label'
                        ]
                    ]
            ])
            ->add([
                    'name'       => 'lastName',
                    'type'       => 'text',
                    'attributes' =>
                    [
                        'required'    => true,
                        'class'       => 'col-sm-10',
                    ],
                    'options' =>
                    [
                        'label' => 'FirstName',
                        'label_attributes' =>
                        [
                            'class' => 'col-sm-2 control-label'
                        ]
                    ]
            ])
            ->add([
                    'name'       => 'password',
                    'type'       => 'password',
                    'attributes' =>
                    [
                        'required'    => true,
                        'class'       => 'col-sm-10'
                    ],
                    'options' =>
                    [
                        'label' => 'Password',
                        'label_attributes' =>
                        [
                            'class' => 'col-sm-2 control-label'
                        ],
                    ],
            ])
            ->add([
                    'name'       => 'passwordVerify',
                    'type'       => 'password',
                    'attributes' =>
                    [
                        'label'       => 'Password again',
                        'required'    => true,
                    ],
                    'options' =>
                    [
                        'label' => 'Password',
                        'label_attributes' =>
                        [
                            'class' => 'col-sm-2 control-label'
                        ],
                    ],
                    'validators' =>
                    [
                        [
                            // Use to be sure that passwordVerify is the same as passwordVerify
                            'name'    => 'Identical',
                            'options' =>
                            [
                                'token' => 'password',
                            ],
                        ],
                    ]
            ])

            ->add([
                'name' => 'role',
                'type' => 'select',
                'attributes' =>
                [
                    'label'       => 'Choose a role',
                    'class'       => 'form-control'
                ],
                'options' =>
                [
                    'empty_option' => 'Select you ROLE',
                    'value_options' =>
                    [
                        'admin'  => User::ROLE_ADMIN,
                        'reader' => User::ROLE_READER
                    ],
                    'label' => 'Password',
                    'label_attributes' =>
                    [
                        'class' => 'col-sm-2 control-label'
                    ],
                ],
            ])

            ->setValidationGroup(
                [
                    'username',
                    'email',
                    'firstName',
                    'lastName',
                    'password',
                    'passwordVerify',
                    'role'
                ]
            );
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        /** @var array $roles */
        $roles = User::getRoles();

        return $roles;
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        $specifications = (new User())->getInputFilterSpecification();

//        $specifications[] =
//        [
//            'name' => 'passwordVerify',
//            'filters' =>
//            [
//                ['name' => 'StripTags'],
//                ['name' => 'StringTrim']
//            ],
//            'validators' =>
//            [
//                [
//                    'name'    => 'Identical',
//                    'options' =>
//                    [
//                        'token' => 'password',
//                    ],
//                ],
//            ],
//        ];

        return $specifications;
    }


}