<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/06/2016
 * Time: 12:38
 */

namespace Application\ServiceManager;

use Zend\ServiceManager\ServiceManager;

/**
 * Concrete implementation of the ServiceManagerAwareInterface .
 * @package Application\ServiceManager
 */
trait ServiceManagerAwareTrait
{
    /**
     * @var ServiceManager
     */
    protected $serviceManager = null;

    /**
     * Set service locator
     *
     * @param ServiceManager $serviceManager
     * @return mixed
     */
    public function setServiceManager(ServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;

        return $this;
    }

    /**
     * Get service locator
     *
     * @return ServiceManager
     */
    public function getServiceManager()
    {
        return $this->serviceManager;
    }
}