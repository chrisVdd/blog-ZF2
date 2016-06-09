<?php
/**
 * ServiceManagerAwareTrait.php
 * 
 * @date        15 févr. 2013
 * @author      Antoine Delamarre (antoine.delamarre@vaconsulting.lu)
 * @file        ServiceManagerAwareTrait.php
 * @copyright   Copyright (c) VAConsulting - All rights reserved
 * @license     Unauthorized copying of this source code, via any medium is strictly 
 *              prohibited, proprietary and confidential.
 */
namespace Application\ServiceManager;

use Zend\ServiceManager\ServiceManager;

/**
 * Implementation of the ServiceManagerAwareInterface .
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