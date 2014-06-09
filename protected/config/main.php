<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'saninail',
    'theme'=>'own',
    'language'=>'am',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.components.ImageHandler.CImageHandler',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'a',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),

        'cms',

	),

	// application components
	'components'=>array(

        'ih'=>array(
            'class'=>'CImageHandler',
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            'loginUrl' => array(
                '0' => '/cms/main/login'
            )
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
            'class'=>'ELangUrlManager',
            'languages'=>array('am'=>'Հայ','ru'=>'Рус', 'en'=>'Eng'), //assoziative array language => label
            'cookieDays'=>30, //keep language 30 days
            //'languageParam'=>'lang', //=default

           /* 'class' => 'ext.language.XUrlManager',
            'appendParams'=>false,
            'supportedLanguages'=>array('am','ru', 'en'),*/

            'showScriptName'=>false,
            'useStrictParsing'=>true,
            'caseSensitive'=>false,
			'urlFormat'=>'path',

			'rules'=>array(
                ''=>'site/index',
               //'<controller:\w+><action:[\w\-]+><id:\d+>' => 'site/<action>',
                //'<lang:\w+>/<action:[\w\-]+>' => '<lang>/site/<action>',

                //'<controller:\w+>/<action:\w+>/<alias:\w+>'=>'<controller>/<action>',

               // '<controller:\w+>/<action:\w+>'=>'<controller>',

                'cms'=>'cms/main/index',
                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>/<id>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
			),

		),

		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// debug database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=ssystem_main',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),

        // release database
       /* 'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=khach2_saninail',
            'emulatePrepare' => true,
            'username' => 'khach2_saninail',
            'password' => 'Uranida060292',
            'charset' => 'utf8',
        ),*/

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages

				/*array(
					'class'=>'CWebLogRoute',
				),*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
        'sourceLanguage'=>'en',
        'defaultLanguage'=>'am',
		// this is used in contact page
		'adminEmail'=>'harutmargaryan91@gmail.com',
	),


);