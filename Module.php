<?php
namespace IdentityCommon;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig() {
        return array(
            'aliases' => array(
                'IdentityCommon\EntityManager' => 'doctrine.entitymanager.identity'
            ),
            'factories' => array(
                'doctrine.entitymanager.identity' => new \DoctrineORMModule\Service\EntityManagerFactory('identity'),
                'doctrine.connection.identity' => new \DoctrineORMModule\Service\DBALConnectionFactory('identity'),
                'doctrine.configuration.identity' => new \DoctrineORMModule\Service\ConfigurationFactory('identity'),
                'doctrine.driver.identity' => new \DoctrineModule\Service\DriverFactory('identity'),
                'doctrine.eventmanager.identity' => new \DoctrineModule\Service\EventManagerFactory('identity'),
                'doctrine.entity_resolver.identity' => new \DoctrineORMModule\Service\EntityResolverFactory('identity'),
            )
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
