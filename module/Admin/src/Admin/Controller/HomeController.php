<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 11/05/2016
 * Time: 12:32
 */

namespace Admin\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class HomeController
 * @package Admin\Controller
 */
class HomeController extends AbstractActionController
{

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }

}