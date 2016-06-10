<?php

namespace Application\Initializer;

use Application\Service\LocalisationAwareInterface;
use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ViewHelper
 * @package Application\Initializer
 */
class ViewHelper implements InitializerInterface {

    /**
     * @param $instance
     * @param ServiceLocatorInterface $locator
     * @return mixed
     */
    public function initialize($instance, ServiceLocatorInterface $locator)
    {
        if ($instance instanceof LocalisationAwareInterface) {

            $inject = $locator->getServiceLocator()->get('service.localisation') and $instance->setLocalisation($inject);

            return $instance;
        }
    }
}