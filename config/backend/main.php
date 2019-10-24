<?php
$params = require __DIR__ . '/params.php';

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'viewPath' => '@app/views/backend',
    'defaultRoute' => 'base/default/index',
    'modules' => [
        'base' => [
            'class' => \app\modules\base\Module::class,
            'viewPath' => '@app/modules/base/views/backend',
            'controllerNamespace' => 'app\modules\base\controllers\backend',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'hjQDsW9QTlIv5UxAzCe3moO-bmdt6Oav',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['/base/default/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'backend-app',
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
