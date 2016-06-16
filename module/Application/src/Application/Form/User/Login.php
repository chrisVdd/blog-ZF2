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
                'type' => 'text'
            ])

            ->add([
                'name' => 'password',
                'type' => 'password'
            ])

            ->add([
                'name' => 'rememberMe',
                'type' => 'checkbox',
            ])

            ->setValidationGroup(['username', 'password'])
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