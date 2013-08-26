<?php

namespace CsnAclNavigation;

use Zend\View\HelperPluginManager;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole;
use Zend\Permissions\Acl\Resource\GenericResource;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/../../src/' . __NAMESPACE__,
                ),
            ),
        );
    }	

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                // This will overwrite the native navigation helper
                'navigation' => function(HelperPluginManager $pm) {
					$sm = $pm->getServiceLocator();
					$config = $sm->get('Config');

					$acl = new \CsnAclNavigation\Acl\Acl($config);

					$auth = $sm->get('Zend\Authentication\AuthenticationService');
					$role = \CsnAclNavigation\Acl\Acl::DEFAULT_ROLE; // The default role is guest $acl

					if ($auth->hasIdentity()) {
						$user = $auth->getIdentity();	
						$role = $user->getRole()->getName();
					}				

                    // Get an instance of the proxy helper
                    $navigation = $pm->get('Zend\View\Helper\Navigation');

                    // Store ACL and role in the proxy helper:
                    $navigation->setAcl($acl)
                               ->setRole($role);

                    // Return the new navigation helper instance
                    return $navigation;
                }
            )
        );
    }

}