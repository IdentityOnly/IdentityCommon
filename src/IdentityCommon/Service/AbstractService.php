<?php
namespace IdentityCommon\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

use Doctrine\ORM\EntityManager;

abstract class AbstractService implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;
    
    protected function getEntityManager() {
        return $this->getServiceLocator()->get('IdentityCommon\EntityManager');
    }
}
