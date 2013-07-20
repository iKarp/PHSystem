<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('nls', dirname(__FILE__).'/../extensions/nls');


// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Print House System',
    'language' => 'ru',
	// preloading 'log' component
	'preload'=>array(
        'log',
        'bootstrap',
    ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
    'theme'=>'bootstrap',
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'0510',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
		),
		
	),

	// application components
	'components'=>array(
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
        
        /*'clientScript' => array(
            'class' => 'nls.NLSClientScript',
            //'excludePattern' => '/\.tpl/i', //js regexp, files with matching paths won't be filtered is set to other than 'null'
            //'includePattern' => '/\.php/', //js regexp, only files with matching paths will be filtered if set to other than 'null'
 
            'mergeJs' => true, //def:true
            'compressMergedJs' => false, //def:false
 
            'mergeCss' => true, //def:true
            'compressMergedCss' => false, //def:false
 
            //'mergeJsExcludePattern' => '/edit_area/', //won't merge js files with matching names
 
            //'mergeIfXhr' => true, //def:false, if true->attempts to merge the js files even if the request was xhr (if all other merging conditions are satisfied)
 
            //'serverBaseUrl' => 'http://localhost', //can be optionally set here
            //'mergeAbove' => 1, //def:1, only "more than this value" files will be merged,
            //'curlTimeOut' => 10, //def:10, see curl_setopt() doc
            //'curlConnectionTimeOut' => 10, //def:10, see curl_setopt() doc
 
            //'appVersion'=>1.0 //if set, it will be appended to the urls of the merged scripts/css
        ),*/
        
        'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		//'db'=>array(
		//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		//),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=phsystem',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'trace',
                    //'categories'=>'*',
                ),
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				
				/*array(
					'class'=>'CWebLogRoute',
                    'categories'=>'dev.*',
				),*/
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
        'taxSalary'=>'30.4',
        'overheadCost'=>'10',
	),
);