<?php

define("STORAGE_FTP_ACCOUNT_NAME", "geostockphotoftp");
define("STORAGE_FTP_ACCOUNT_KEY", "aQeed2Yk7JEVvpcOspSUgnxpf7Op/dELsC09bXb4suEPhC2dxF+NPPg4U3d/jQnpPTeQY/SKGgedJf1JFnPGdw==");

define("STORAGE_ACCOUNT_NAME", "geostockphoto1");
define("STORAGE_ACCOUNT_KEY", "YwYTJ5JK1Un9C/lTo371pdPJdvLpLggaerCj1WRP1vPBt8NXoca2tokonQjDYLpBQIkvqJ+k7csA4TKPnkcJIg==");

/**
 * Main configuration.
 * All properties can be overridden in mode_<mode>.php files
 */

return array(

	// Set yiiPath (relative to Environment.php)
	'yiiPath' => dirname(__FILE__) . '/../../framework/yii.php',
	'yiicPath' => dirname(__FILE__) . '/../../framework/yiic.php',
	'yiitPath' => dirname(__FILE__) . '/../../framework/yiit.php',

	// Set YII_DEBUG and YII_TRACE_LEVEL flags
	'yiiDebug' => false,
	'yiiTraceLevel' => 3,

	// Static function Yii::setPathOfAlias()
	'yiiSetPathOfAlias' => array(
		// uncomment the following to define a path alias
		//'local' => 'path/to/local-folder'
	),

	// This is the main Web application configuration. Any writable
	// CWebApplication properties can be configured here.
	'configWeb' => array(

		'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
		'name'=>'GeoStockPhoto',

		// Preloading 'log' component
		'preload' => array(
			'log',
			'bootstrap', // preload the bootstrap component
		),

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
				'password'=>false,
				// If removed, Gii defaults to localhost only. Edit carefully to taste.
				'ipFilters'=>array('127.0.0.1','::1'),
				'generatorPaths'=>array(
		            'bootstrap.gii',
		        ),
			),
			
		),
			
		'homeUrl'=>array('photo/index'),
		// application components
		'components'=>array(
			'urlManager'=>array(
				'urlFormat'=>'path',
				//Da decommentare sul server dopo aver scritto il rewrite nell'htaccess file
				'showScriptName'=>false,
				'rules'=>array(
					/*'photonhomepage'=>'site/photonhomepage',
					'photonhomepage/en'=>'site/photonhomepage/lang/en',
					'photonhomepage/it'=>'site/photonhomepage/lang/it',
					'en'=>'site/index/lang/en',
					'it'=>'site/index/lang/it',*/
				    'photographers'=>'site/startPhotographer',
				    'youdonothing'=>'site/youdonothing',
					'portfolio/<user:[a-zA-Z0-9\.\-]+>'=>'photo/index',
				    'login'=>'site/login',
				    ''=>'photo/index',
					'photo/view/<id:\w+>/<title:[\w\-]+>'=>'photo/view/id/<id>/title/<title>',
					'photo/view/<id:\w+>'=>'photo/view/id/<id>',
					'user/view/<username:[a-zA-Z0-9\.\-]+>'=>'user/view/username/<username>',
					//'photo/status/<state:\w+>/*'=>'photo/status/state/<state>',
					'location/<location:\w+>/*'=>'photo/index',
					//'photo/location/<location:\w+>/*'=>'photo/index',
				    'photo/map'=>'photo/index',
					//'photo/reportAbuse/<id:\w+>/*'=>'photo/reportAbuse/id/<id>',
				    'about'=>'site/about',
				    'howitworks'=>'site/howitworks',
				    'howitworks/<id:\w+>/*'=>'site/howitworks/section/<id>',
				    'register/idRef/<idRef:\w+>/codeRef/<codeRef:\w+>'=>'user/create/idRef/<idRef>/codeRef/<codeRef>',
				    'register'=>'user/create',
					'register/coupon/<coupon:[A-Z0-9]+>'=>'user/create/coupon/<coupon>',
				    'general-terms'=>'site/page/view/general-terms',
				    'youdonothing-terms'=>'site/page/view/youdonothing-terms',
				    'submit-terms'=>'site/page/view/submit-terms',
				    'group-terms'=>'site/page/view/group-terms',
				    //'license-royalty-free-standard'=>'site/page/view/license-royalty-free-standard',
				    //'license-royalty-free-extended'=>'site/page/view/license-royalty-free-extended',
				    //'license-right-managed'=>'site/page/view/license-right-managed',
				    'licenses'=>'site/page/view/licenses',
				    'api_doc'=>'site/page/view/api_doc',
				    'loadMap'=>'site/page/view/loadMap',
				    'photo/guidelines'=>'site/page/view/guidelines',
					//'<controller:\w+>/<id:\d+>'=>'<controller>/view',
					//'photo'=>'photo/index',
					//'<action:\w+>/*'=>'photo/<action>',
					//'<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
					'promotion/<id:\w+>/*'=>'user/promotion/promotion/<id>',
					'groups/<id:\w+>/*'=>'user/groups/group/<id>',
				),
			),
			/*'geoip' => array(
				'class' => 'application.extensions.geoip.CGeoIP',
				// specify filename location for the corresponding database
				'filename' => dirname(__FILE__).'\..\extensions\geoip\GeoLiteCity.dat',
				// Choose MEMORY_CACHE or STANDARD mode
				'mode' => 'STANDARD',
			),*/
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
					'password' => '',                   
				),
				'viewPath' => 'application.views.mail',
				'logging' => true,
				'dryRun' => false
			),
			'bootstrap'=>array(
		        'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
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
				'connectionString' => 'mysql:host=localhost;dbname=geostockphoto_dev',
				//'emulatePrepare' => true,
				'username' => 'root',
				'password' => '',
				//'charset' => 'utf8',
				//'enableProfiling'=>true,
			),
				
			// PROD CONFIG
			/*'db'=>array(
				'connectionString' => 'mysql:host=mysql.dev.geostockphoto.com;dbname=geostockphoto',
				'emulatePrepare' => true,
				'username' => 'admin_prod_db',
				'password' => '',
				'charset' => 'utf8',
				'enableProfiling'=>true,
			),*/
				
			// DEV CONFIG
			/*'db'=>array(
				'connectionString' => 'mysql:host=mysql.dev.geostockphoto.com;dbname=geostockphoto_dev',
				'emulatePrepare' => true,
				'username' => 'admin_db_dev',
				'password' => '',
				'charset' => 'utf8',
				'enableProfiling'=>true,
			),*/				
			
			'errorHandler'=>array(
				// use 'site/error' action to display errors
						'errorAction'=>'site/error',
			),
			
			'log'=>array(
				'class'=>'CLogRouter',
				'routes'=>array(),
			),
			'session'=>array(
                'class'=>'CDbHttpSession',
                'connectionID'=>'db',
				/*'cookieParams'=>array(
					'httpOnly'=>true,
					'lifetime'=>7200 // 2 ore
				),
				'timeout'=>7200 // 2 ore*/
                //'sessionTableName'=>'test',
            ),
            'facebook'=>array(
			    'class' => 'ext.yii-facebook-opengraph.SFacebook',
			    'appId'=>'402630783131751', // needed for JS SDK, Social Plugins and PHP SDK
			    'secret'=>'d04bb793bb9d2962d6728028fc4d25fd', // needed for the PHP SDK
			    //'fileUpload'=>false, // needed to support API POST requests which send files
			    //'trustForwarded'=>false, // trust HTTP_X_FORWARDED_* headers ?
			    'locale'=>'en_US', // override locale setting (defaults to en_US)
			    //'jsSdk'=>true, // don't include JS SDK
			    //'async'=>true, // load JS SDK asynchronously
			    //'jsCallback'=>false, // declare if you are going to be inserting any JS callbacks to the async JS SDK loader
			    //'status'=>true, // JS SDK - check login status
			    //'cookie'=>true, // JS SDK - enable cookies to allow the server to access the session
			    //'oauth'=>true,  // JS SDK - enable OAuth 2.0
			    //'xfbml'=>true,  // JS SDK - parse XFBML / html5 Social Plugins
			    //'frictionlessRequests'=>true, // JS SDK - enable frictionless requests for request dialogs
			    //'html5'=>true,  // use html5 Social Plugins instead of XFBML
			    'ogTags'=>array(  // set default OG tags
			        'og:title'=>'GeoStockPhoto',
			        'og:description'=>'Sell and Buy Photos from all the World',
			        'og:image'=>'http://www.geostockphoto.com/images/GeoStockPhotoICO.jpg',
			    ),
			),
		),

		// application-level parameters that can be accessed
		// using Yii::app()->params['paramName']
		'params'=>array(
			// this is used in contact page
			'no-replyEmail'=>'no-reply@geostockphoto.com',
			'infoEmail'=>'info@geostockphoto.com',
		),
	),
	

	// This is the Console application configuration. Any writable
	// CConsoleApplication properties can be configured here.
    // Leave array empty if not used.
    // Use value 'inherit' to copy from generated configWeb.
	'configConsole' => array(

		'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
		'name' => 'My Console Application',

		// Preloading 'log' component
		'preload' => array('log'),

		// Autoloading model and component classes
		'import'=>'inherit',

		// Application componentshome
		'components'=>array(

			// Database
			'db'=>'inherit',

			// Application Log
			'log' => array(
				'class' => 'CLogRouter',
				'routes' => array(
					// Save log messages on file
					array(
						'class' => 'CFileLogRoute',
						'levels' => 'error, warning, trace, info',
					),
				),
			),

		),

	),

);