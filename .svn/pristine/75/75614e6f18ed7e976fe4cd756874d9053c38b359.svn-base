<?php

require_once 'Microsoft/Autoloader.php';

// set environment
require_once(dirname(__FILE__) . '/protected/extensions/yii-environment/Environment.php');
$env = new Environment('LOCAL');
//$env = new Environment('PRODUCTION'); //override mode


// change the following paths if necessary
//$yii=dirname(__FILE__).'/../framework/yii.php';
//$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',$env->yiiDebug);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',$env->yiiTraceLevel);

//require_once($yii);
//Yii::createWebApplication($config)->run();

// run Yii app
//$env->showDebug(); // show produced environment configuration
require_once($env->yiiPath);
$env->runYiiStatics(); // like Yii::setPathOfAlias()
Yii::createWebApplication($env->configWeb)->run();
