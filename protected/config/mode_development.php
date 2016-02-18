<?php

/**
 * Development configuration
 * Usage:
 * - Local website
 * - Local DB
 * - Show all details on each error
 * - Gii module enabled
 */

return array(

	// Set yiiPath (relative to Environment.php)
	//'yiiPath' => dirname(__FILE__) . '/../../../yii/framework/yii.php',
	//'yiicPath' => dirname(__FILE__) . '/../../../yii/framework/yiic.php',
	//'yiitPath' => dirname(__FILE__) . '/../../../yii/framework/yiit.php',

	// Set YII_DEBUG and YII_TRACE_LEVEL flags
	'yiiDebug' => true,
	'yiiTraceLevel' => 3,
	
	// Static function Yii::setPathOfAlias()
	'yiiSetPathOfAlias' => array(
		// uncomment the following to define a path alias
		//'local' => 'path/to/local-folder'
	),

	// This is the specific Web application configuration for this mode.
	// Supplied config elements will be merged into the main config array.
	'configWeb' => array(

		// Application components
		'components' => array(
			'urlManager'=>array(
				//Da decommentare sul server dopo aver scritto il rewrite nell'htaccess file
				'showScriptName'=>false,
			),

			// DEV CONFIG
			'db'=>array(
				'connectionString' => 'mysql:host=mysql.dev.geostockphoto.com;dbname=geostockphoto_dev',
				'emulatePrepare' => true,
				'username' => 'admin_db_dev',
				'password' => 'mg-CS-1983-db-dev',
				'charset' => 'utf8',
				'enableProfiling'=>true,
			),

		),
		
		'params'=>array(
			'paypalEnv'=>'SANDBOX2',
			'usersPath'=>'/home/gsp_photos_dev/ftp_tunnel',
		),

	),
	
	// This is the Console application configuration. Any writable
	// CConsoleApplication properties can be configured here.
    // Leave array empty if not used.
    // Use value 'inherit' to copy from generated configWeb.
	'configConsole' => array(
	),

);