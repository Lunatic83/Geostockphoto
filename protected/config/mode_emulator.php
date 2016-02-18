<?php
define("STORAGE_ACCOUNT_NAME_ASSETS", "devstoreaccount1");
define("STORAGE_ACCOUNT_KEY_ASSETS", "Eby8vdM02xNOcqFlqUwJPLlmEtlCDXJ1OUzFT50uSRZ6IFsuFq2UVErCz4I6tq/K1SZFPTOtr/KBHBeksoGMGw==");
define("BLOB_CONTAINER_ASSETS", "assets1");

define("STORAGE_ACCOUNT_NAME", "devstoreaccount1");
define("STORAGE_ACCOUNT_KEY", "Eby8vdM02xNOcqFlqUwJPLlmEtlCDXJ1OUzFT50uSRZ6IFsuFq2UVErCz4I6tq/K1SZFPTOtr/KBHBeksoGMGw==");

/**
 * Staging configuration
 * Usage:
 * - Online website
 * - Production DB
 * - All details on error
 */

return array(
	
	// Set yiiPath (relative to Environment.php)
	//'yiiPath' => dirname(__FILE__) . '/../../../yii/framework/yii.php',
	//'yiicPath' => dirname(__FILE__) . '/../../../yii/framework/yiic.php',
	//'yiitPath' => dirname(__FILE__) . '/../../../yii/framework/yiit.php',

	// Set YII_DEBUG and YII_TRACE_LEVEL flags
	'yiiDebug' => true,
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

			// LOCALHOST CONFIG
			'db'=>array(
			/*connectionString' => 'mysql:host=localhost;dbname=geostockphoto_dev',
				'emulatePrepare' => true,
				'username' => 'root',
				'password' => '',
				'charset' => 'utf8',
				'enableProfiling'=>true,*/
				
				  // new MS PDO + MSSQL 2005 2008
			   	'connectionString' => 'sqlsrv:Server=GSP-VM\GEOSTOCKPHOTODB;Database=geostockphoto_dev_emu',
			   	'username' => 'sa',
			    'password' => 'gsp-sqlserver-local',
			   // 'charset' => 'Latin1_General_CI_AS', //  'GB2312',  //Latin1_General_CI_AS
			    //'tablePrefix' => 'tbl_',
			),
			
         	'session'=>array(
                        'class'=>'CDbHttpSession',
                        'connectionID'=>'db',
                        //'sessionTableName'=>'test',

            ),
		),
		
		'params'=>array(
			//'paypalEnv'=>'SANDBOX2',
			'paypalEnv'=>'LIVE',
			'usersPath'=>'localhost',
			'useBlob'=>true,
			'useStorageEmulator'=>true,
		),

	),
	
	// This is the Console application configuration. Any writable
	// CConsoleApplication properties can be configured here.
    // Leave array empty if not used.
    // Use value 'inherit' to copy from generated configWeb.
	'configConsole' => array(
	),

);