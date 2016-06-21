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

use Application\Form\User\Register  as UserRegisterForm;
use Application\Form\User\Login     as UserLoginForm;

use Zend\Authentication\Adapter\AbstractAdapter as AbstractAdapter;
use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Authentication\AuthenticationService as AuthenticationService;

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

        /** @var array $data */
        $data = $this->params()->fromPost();

        $registerForm->setData($data);

        if ($this->getRequest()->isPost()) {

            if ($registerForm->isValid()) {

                /** @var UserEntity $user */
                $user = $registerForm->getData();

                /** @var UserService $userService */
                $userService = $this->getServiceLocator()->get('application.service.user');
                $userService->createUser($user);

                $this->flashMessenger()->addSuccessMessage('Ok, user is register');

                $this->redirect()->toRoute('home/user', ['action' => 'login'], [], true);

            } else {

                $this->flashMessenger()->addErrorMessage('Something wrong...');
            }
        }

        return compact ('registerForm');
    }

    /**
     * @return ViewModel
     */
    public function loginAction()
    {

        /** @var UserLoginForm $loginForm */
        $loginForm = $this
            ->getServiceLocator()
            ->get('FormElementManager')
            ->get('application.form.login-user');

        /** @var array $data */
        $data = $this->params()->fromPost();

        $loginForm->setData($data);

        if ($this->request->isPost()) {

            // If form is Valid
            if ($loginForm->isValid()) {

                $data = $loginForm->getData();

                /** @var AuthenticationService $authService */
                $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

                /** @var AbstractAdapter $adapter */
                $adapter = $authService->getAdapter();

                $adapter->setIdentity($data['username']);
                $adapter->setCredential($data['password']);
                $authResult = $authService->authenticate();

                if ($authResult->isValid()) {

                    $this->flashMessenger()->addSuccessMessage('Login is OK');
                    return $this->redirect()->toRoute('home/user/profile');
                }

            // If form is NOT Valid
            } else {

                $this->flashMessenger()->addErrorMessage('ERROR in login');
                return $this->redirect()->toRoute(('/home/user/index'));
            }
        }

        return new ViewModel(
            [
                'loginForm' => $loginForm,
                'error'     => 'Your authentication credentials are not valid',
            ]
        );
    }

    /**
     * @return ViewModel
     */
    public function updateAction()
    {
        return new ViewModel();
    }

    /**
     * @return ViewModel
     */
    public function profileAction()
    {
        return new ViewModel();
    }

}