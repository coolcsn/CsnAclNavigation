<?php

return array(
     'navigation' => array(
         'default' => array(
             array(
                 'label' => 'Home',
                 'route' => 'home',
				 'resource' => 'Application\Controller\Index',
				 'privilege' => 'index',
             ),
			 array(
                 'label' => 'Login',
                 'route' => 'login', 
				 'controller' => 'Index',
				 'action'     => 'login',
				 'resource'	  => 'CsnUser\Controller\Index',
				 'privilege'  => 'login',
             ),
			 array(
                 'label' => 'User',
                 'route' => 'user', 
				 'controller' => 'Index',
				 'action'     => 'index',
				 'resource'	  => 'CsnUser\Controller\Index',
				 'privilege'  => 'index',
             ),
             array(
                 'label' => 'Registration',
                 'route' => 'registration', 
				 'controller' => 'Registration',
				 'action'     => 'index',
				 'resource'	  => 'CsnUser\Controller\Registration',
				 'privilege'  => 'index',
				 'title'	  => 'Registration Form'
             ),
             array(
                 'label' => 'Edit profile',
                 'route' => 'editProfile', 
				 'controller' => 'Registration',
				 'action'     => 'editProfile',
				 'resource'	  => 'CsnUser\Controller\Registration',
				 'privilege'  => 'editProfile',
             ),
			array(
				'label' => 'Zend',
				'uri'   => 'http://framework.zend.com/',
				'resource' => 'Zend',
				'privilege'	=>	'uri'
			),
			array(
                 'label' => 'CMS',
                 'route' => 'csn-cms', 
				 'controller' => 'Index',
				 'action'     => 'index',
				 'resource'	  => 'CsnCms\Controller\Index',
				 'privilege'  => 'index'
             ),
            array(
                 'label' => 'Logout',
                 'route' => 'logout', 
				 'controller' => 'Index',
				 'action'     => 'logout',
				 'resource'	  => 'CsnUser\Controller\Index',
				 'privilege'  => 'logout'
             ),
			
		 ),
	 ),
     'service_manager' => array(
         'factories' => array(
             'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory',
         ),
     ),
);