<?php
/**
 * Coolcsn Zend Framework 2 Navigation Module
 * 
 * @link https://github.com/coolcsn/CsnAclNavigation for the canonical source repository
 * @copyright Copyright (c) 2005-2013 LightSoft 2005 Ltd. Bulgaria
 * @license https://github.com/coolcsn/CsnAclNavigation/blob/master/LICENSE BSDLicense
 * @authors Stoyan Cheresharov <stoyan@coolcsn.com>, Anton Tonev <atonevbg@gmail.com>
*/

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

					$acl = $sm->get('acl');

					$auth = $sm->get('Zend\Authentication\AuthenticationService');
					$role = \CsnAuthorization\Acl\Acl::DEFAULT_ROLE; // The default role is guest $acl

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