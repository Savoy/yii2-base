<?php
$params = require __DIR__ . '/params.php';

return [
    'id' => 'app-backend',
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
            'cookieValidationKey' => 'q7OftDc4G5F7T_q5t2FSISRXGA-AmLL6',
        ],
        'user' => [
            'identityClass' => app\models\User::class,
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
        'urlManager' => require __DIR__ . '/urlManager.php',
    ],
    'params' => $params,
];
