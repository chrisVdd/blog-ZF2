<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 01/06/2016
 * Time: 12:39
 */

namespace Application\Controller;

use Application\Entity\User as UserEntity;

use Application\Service\User as UserService;

use Application\Form\User\Register as UserRegisterForm;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class UserController
 * @package Application\Controller
 */
class UserController extends AbstractActionController
{

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }

    /**
     * Register a user
     */
    public function registerAction()
    {
        /** @var UserRegisterForm $registerForm */
        $registerForm = $this
            ->getServiceLocator()
            ->get('FormElementManager')
            ->get('application.form.register-user');

        /** @var mixed $data */
        $data = $this->params()->fromPost();

        $registerForm->setData($data);

        if ($this->getRequest()->isPost()) {
            
            $registerForm->setData($data);

            if ($registerForm->isValid()) {

                /** @var UserEntity $user */
                $user = $registerForm->getData();
                
                /** @var UserService $userService */
                $userService = $this->getServiceLocator()->get('application.service.user');

                $userService->createUser($user);

                $this->flashMessenger()->addSuccessMessage('Ok, user is register');
                $this->redirect()->toRoute('home', ['action' => 'index'], [], true);
            }
        }

        return
        [
            'registerForm' => $registerForm,
        ];
    }

    /**
     * @return ViewModel
     */
    public function loginAction()
    {
        return new ViewModel();
    }

    /**
     * @return ViewModel
     */
    public function updateAction()
    {
        return new ViewModel();
    }

}