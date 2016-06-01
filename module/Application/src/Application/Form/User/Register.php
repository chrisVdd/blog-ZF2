<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 25/05/2016
 * Time: 16:54
 */

namespace Application\Form\User;

use Application\Form\HydratableEntityInterface;

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
                        'placeholder' => 'username',
                    ]
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
                        'placeholder' => 'username',
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
                        'placeholder' => 'firstName',
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
                        'placeholder' => 'lastName',
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
                            'placeholder' => 'password',
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
                        ],
                ]
            )
        ;
    }

    public function getInputFilterSpecification()
    {
        // TODO: Implement getInputFilterSpecification() method.
    }


}