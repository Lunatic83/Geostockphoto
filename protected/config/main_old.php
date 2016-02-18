<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'GeoStockPhoto',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.components.helpers.*',
		'ext.mail.YiiMailMessage',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'geostockphoto',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'urlManager'=>array(
            'urlFormat'=>'path',
            //Da decommentare sul server dopo aver scritto il rewrite nell'htaccess file
            //'showScriptName'=>false,
			'rules'=>array(
				'en'=>'site/index/lang/en',
				'it'=>'site/index/lang/it',
				'portfolio/<user:\w+>'=>'photo/index',
				'location/<location:\w+>/*'=>'photo/index',
				'photo/location/<location:\w+>/*'=>'photo/index',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				//'photo'=>'photo/index',
				//'<action:\w+>/*'=>'photo/<action>',
				//'<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
			),
        ),
		'imagemod' => array(
               //alias to dir, where you unpacked extension
		    'class' => 'ext.imagemodifier.CImageModifier',
		),
		'jumploader' => array(
            'class' => 'ext.jumploader.jumploader',
        ),
		'mail' => array(
 			'class' => 'ext.mail.YiiMail',
 			'transportType' => 'smtp',
 			'transportOptions' => array(
				                    'host' => 'mail.geostockphoto.com',
				                    'username' => 'no-reply@geostockphoto.com',
				                    'password' => 'no-gsp-reply',                   
				            	),
 			'viewPath' => 'application.views.mail',
 			'logging' => true,
 			'dryRun' => false
 		),
		
		'user'=>array(
		    // There you go, use our 'extended' version
            'class'=>'application.components.GSPWebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			//'loginUrl'=>array('site/login')
		),
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		// LOCALHOST CONFIG
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=geostockphoto',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'enableProfiling'=>true,
		),
			
		// PROD CONFIG
		/*'db'=>array(
			'connectionString' => 'mysql:host=mysql.dev.geostockphoto.com;dbname=geostockphoto',
			'emulatePrepare' => true,
			'username' => 'admin_prod_db',
			'password' => 'mg-CS-1983-db',
			'charset' => 'utf8',
			'enableProfiling'=>true,
		),*/
			
		// DEV CONFIG
		/*'db'=>array(
			'connectionString' => 'mysql:host=mysql.dev.geostockphoto.com;dbname=geostockphoto_dev',
			'emulatePrepare' => true,
			'username' => 'admin_db_dev',
			'password' => 'mg-CS-1983-db-dev',
			'charset' => 'utf8',
			'enableProfiling'=>true,
		),*/				
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            		'errorAction'=>'site/error',
        ),
        
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@geostockphoto.com',
		'no-replyEmail'=>'no-reply@geostockphoto.com',
		'infoEmail'=>'info@geostockphoto.com',
	),
);

