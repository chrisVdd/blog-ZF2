<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 25/05/2016
 * Time: 16:54
 */

namespace Application\Form\User;

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
class Register extends Form implements HydratableEntityInterface, InputFilterProviderInterface, ServiceLocatorAwareInterface
{

    protected $entityName = 'Application\Entity\User';

    use HydratableEntityTrait;
    use ServiceLocatorAwareTrait;

    public function init()
    {

        $this
            ->setAttributes(['class' => 'form'])

            ->add(
                [
                    'name' => 'username',
                    'type' => 'text',
                    'attributes' =>
                    [
                        'label'       => 'username',
                        'required'    => 'required',
                        'placeholder' => 'Enter username',
                        'class'       => 'form-control',
                        'pattern'     => '^[A-Za-z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\s.-].{0,}$',
                    ],
                    ''
                ]
            )

            ->add(
                [
                    'name' => 'email',
                    'type' => 'email',
                    'attributes' =>
                    [
                        'label'       => 'email',
                        'required'    => 'required',
                        'placeholder' => 'Enter email',
                        'class'       => 'form-control',
                        'pattern'     => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$'
                    ]
                ]
            )

            ->add(
                [
                    'name'       => 'firstName',
                    'type'       => 'text',
                    'attributes' =>
                    [
                        'label'       => 'firstName',
                        'required'    => 'required',
                        'placeholder' => 'Enter firstName',
                        'class'       => 'form-control',
                        'pattern'     => '^[A-Za-z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\s.-].{0,}$',
                    ],
                ]
            )

            ->add(
                [
                    'name'       => 'lastName',
                    'type'       => 'text',
                    'attributes' =>
                    [
                        'label'       => 'lastName',
                        'required'    => 'required',
                        'placeholder' => 'Enter lastName',
                        'class'       => 'form-control',
                        'pattern'     => '^[A-Za-z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\s.-].{0,}$',
                    ],
                ]
            )

            ->add(
                [
                    'name'       => 'password',
                    'type'       => 'password',
                    'attributes' =>
                    [
                        'label'       => 'password',
                        'required'    => 'required',
                        'placeholder' => 'Enter password',
                        'class'       => 'form-control'
                    ],
                ]
            )

            ->add(
                [
                    'name'       => 'passwordVerify',
                    'type'       => 'password',
                    'attributes' =>
                    [
                        'label'       => 'passwordVerify',
                        'required'    => 'required',
                        'placeholder' => 'Password Verify',
                        'class'       => 'form-control'
                    ],
                ]
            )
            ->setValidationGroup(
                'username',
                'email',
                'firstName',
                'lastName',
                'password',
                'passwordVerify'
            );
    }

    /**
     *
     */
    public function getInputFilterSpecification()
    {
        return
        [
            [
                'name'      => 'username',
                'required'  => true,
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
                'name'      => 'email',
                'required'  => false,
                'filters'   =>
                [
                    ['name' => 'StringTrim'],
                ],
                'validators' =>
                [
                    ['name' => 'EmailAddress']
                ]
            ],
            [
                'name'      => 'firstName',
                'required'  => false,
                'filters'   =>
                [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' =>
                [
                    [
                        'name'    => 'StringLength',
                        'options' => ['min' => 0]
                    ]
                ],
            ],
            [
                'name'      => 'lastName',
                'required'  => false,
                'filters'   =>
                [
                    ['name' => 'StripTags'],
                    ['name' => 'StringTrim'],
                ],
                'validators' =>
                [
                    [
                        'name'    => 'StringLength',
                        'options' => ['min' => 0]
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
        ];
    }


}