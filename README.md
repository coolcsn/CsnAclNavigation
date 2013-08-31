CsnAclNavigation
=======

**What is CsnAclNavigation?**

CsnAclNavigation is a Module for ```Navigation``` using ```Access Control List``` based on Zend Framework 2

**What exactly does CsnAclNavigation?**

CsnAclNavigation has been created with educational purposes to demonstrate how Navigation can be done. It is fully functional.

Installation
============

- Installation via composer is supported, simply run (make sure you've set `"minimum-stability": "dev"` in your *composer.json* file):
`php composer.phar require coolcsn/csn-acl-navigation:dev-master`

Go to your application configuration in ```./config/application.config.php```and add 'CsnAclNavigation'.
An example application configuration could look like the following:

```
'modules' => array(
    'Application',
    'DoctrineModule',
    'DoctrineORMModule',
    'CsnUser',
	'CsnAuthorization',
    'CsnAclNavigation'
)
```

Configuration
=============
1. Copy the sample Navigation configuration from `./vendor/coolcsn/csn-acl-navigation/config/navigation.global.php.dist`. to `./config/autoload` renaming it to **navigation.global.php** and edit.

We recommend using the same names for the resources and privileges of the pages as for the controllers and actions. This is done to keep the Navigation and Authorization in sync.

If we have a link in our navigation to resource named "Album\Controller\Album" and privilege "index", please use the same resource and privilege name to configure your MVC page in the navigation.

For example:

```
	array(
                 'label' => 'Album', // 'Page #1',
                 'route' => 'album', // 'page-1',
				 'action'     => 'index',
				 'controller' => 'index',
				 'resource'	=> 'Album\Controller\Album',
				 'privilege'	=> 'index',
                 'pages' => array(
                     array(
                         'label' => 'Add', // 'Child #1',
                         'route' => 'album',
						 'params' => array('action' => 'add'),
						 'resource'	=> 'Album\Controller\Album',
						 'privilege'	=> 'add',
                     ),
                 ),
             ),
```

Show navigation
===============

Add this somewhere in your layout `./module/Application/view/layout/layout.phtml` :
```
<?php echo $this->navigation('navigation')->menu(); ?>
```

If you are you sing *Bootstrap* (as the default skeleton application does), you may as well use:
```
<?php echo $this->navigation('navigation')->menu()->setUlClass('nav navbar-nav'); ?>
```

Dependencies
============

This Module depends on the following Modules:

 - [CsnUser](https://github.com/coolcsn/CsnUser)
 - [CsnAuthorization](https://github.com/coolcsn/CsnAuthorization)

Recommends
==========

- [CsnAuhorization](https://github.com/coolcsn/CsnAuthorization) - An authorization system, using ACL.
- [coolcsn/CsnCms](https://github.com/coolcsn/CsnCms) - Content management system;