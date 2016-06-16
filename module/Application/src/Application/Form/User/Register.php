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
            ->setAttributes(['class' => 'form'])
            ->add([
                    'name' => 'username',
                    'type' => 'text',
                    'attributes' =>
                    [
                        'label'       => 'username',
                        'required'    => true,
                        'placeholder' => 'Enter username',
                        'class'       => 'form-control',
                    ],
            ])
            ->add([
                    'name' => 'email',
                    'type' => 'email',
                    'attributes' =>
                    [
                        'label'       => 'email',
                        'required'    => true,
                        'placeholder' => 'Enter email',
                        'class'       => 'form-control',
                    ]
            ])
            ->add([
                    'name'       => 'firstName',
                    'type'       => 'text',
                    'attributes' =>
                    [
                        'label'       => 'firstName',
                        'required'    => true,
                        'placeholder' => 'Enter firstName',
                        'class'       => 'form-control',
                    ],
            ])
            ->add([
                    'name'       => 'lastName',
                    'type'       => 'text',
                    'attributes' =>
                    [
                        'label'       => 'lastName',
                        'required'    => true,
                        'placeholder' => 'Enter lastName',
                        'class'       => 'form-control',
                    ],
            ])
            ->add([
                    'name'       => 'password',
                    'type'       => 'password',
                    'attributes' =>
                    [
                        'label'       => 'password',
                        'required'    => true,
                        'placeholder' => 'Enter password',
                        'class'       => 'form-control'
                    ],
            ])
            ->add([
                    'name'       => 'passwordVerify',
                    'type'       => 'password',
                    'attributes' =>
                    [
                        'label'       => 'passwordVerify',
                        'required'    => true,
                        'placeholder' => 'Password Verify',
                        'class'       => 'form-control'
                    ],
            ])
            ->setValidationGroup(
                [
                    'username',
                    'email',
                    'firstName',
                    'lastName',
                    'password',
                    'passwordVerify'
                ]
            );
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