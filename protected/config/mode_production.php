<?php
define("STORAGE_ACCOUNT_NAME_ASSETS", "assets1");
define("STORAGE_ACCOUNT_KEY_ASSETS", "WrDkBeP3yUaJYBwty2iP3pww6ze03CqZJVOpVtgsEpwavHUgZAslkZfYLX2zL75SPw+aSe337VTYKXfhHtT63g==");
define("BLOB_CONTAINER_ASSETS", "assets1");

/**
 * Production configuration
 * Usage:
 * - Online website
 * - Production DB
 * - Standard production error pages (404, 500, etc.)
 */

return array(
	
	// Set yiiPath (relative to Environment.php)
	//'yiiPath' => dirname(__FILE__) . '/../../../yii/framework/yii.php',
	//'yiicPath' => dirname(__FILE__) . '/../../../yii/framework/yiic.php',
	//'yiitPath' => dirname(__FILE__) . '/../../../yii/framework/yiit.php',

	// Set YII_DEBUG and YII_TRACE_LEVEL flags
	'yiiDebug' => false,
	'yiiTraceLevel' => 0,
	
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
			
      		/* Non è possibile perchè il local storage non è accessibile dall'esterno
      		 * 'assetManager'=>array(
                'basePath'=>azure_getlocalresourcepath('localStoreOne'),
                'baseUrl'=>azure_getlocalresourcepath('localStoreOne'),
			),*/

			// PROD CONFIG
			'db'=>array(
				/*'connectionString' => 'mysql:host=mysql.dev.geostockphoto.com;dbname=geostockphoto',
				'emulatePrepare' => true,
				'username' => 'admin_prod_db',
				'password' => 'mg-CS-1983-db',
				'charset' => 'utf8',
				'enableProfiling'=>true,*/
			   	'connectionString' => 'sqlsrv:Server=g92zpcpa4s.database.windows.net;Database=geostockphoto_prod',
			   	'username' => 'geostockphoto_user_prod',
			    'password' => 'mg-CS-1983#dbpr',
			),

		),
		
		'params'=>array(
			'paypalEnv'=>'LIVE',
			'usersPath'=>'/home/gsp_photos/ftp_tunnel',
			'useBlob'=>true,
			'useStorageEmulator'=>false,
			'env'=>'PRODUCTION'
		),

	),
	
	// This is the Console application configuration. Any writable
	// CConsoleApplication properties can be configured here.
    // Leave array empty if not used.
    // Use value 'inherit' to copy from generated configWeb.
	'configConsole' => array(
	
		// Application components
		'components' => array(
			
			// Application Log
			'log' => 'inherit',

		),

	),

);
