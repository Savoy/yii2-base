<?php
$params = require __DIR__ . '/frontend/params.php';

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'viewPath' => '@app/views/frontend',
    'defaultRoute' => 'base/default/index',
    'modules' => [
        'base' => [
            'class' => \app\modules\base\Module::class,
            'viewPath' => '@app/modules/base/views/frontend',
            'controllerNamespace' => 'app\modules\base\controllers\frontend',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'q7OftDc4G5F7T_q5t2FSISRXGA-AmLL6',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
            'loginUrl' => ['/base/default/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'frontend-app',
        ],
        'errorHandler' => [
            'errorAction' => 'base/default/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
