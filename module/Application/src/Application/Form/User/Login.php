<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 14/06/2016
 * Time: 21:04
 */

namespace Application\Form\User;


use Application\Entity\User;
use Zend\Form\Form;

/**
 * Class Login
 * @package Application\Form\User
 */
class Login extends Form
{

    public function init()
    {
        $this
            ->setAttribute('class', 'form-horizontal')

            ->add([
                'name' => 'username',
                'type' => 'text',
                'attributes' =>
                [
                    'required'    => true,
                    'class'       => 'form-control',
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
                'name' => 'password',
                'type' => 'password',
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
                'name' => 'csrf_connect',
                'type' => 'Zend\Form\Element\Csrf',
                'options' =>
                [
                    'csrf_options' =>
                    [
                        'timeout' => 600,
                    ],
                ],
            ])

            ->add([
                'name' => 'rememberMe',
                'type' => 'checkbox',
            ])

            ->setValidationGroup(['username', 'password', 'csrf_connect']);
        ;
    }

//    /**
//     * @return array
//     */
//    public function getInputFilterSpecification()
//    {
//        $specs = (new User())->getInputFilterSpecification();
//        return [$specs['userName'], $specs['password']];
//    }

}