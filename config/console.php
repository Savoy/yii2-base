<?php
$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'app-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'modules' => [],
    'components' => [
        'errorHandler' => [
            'class' => \yii\console\ErrorHandler::class,
        ],
    ],
    'params' => $params,
    'controllerMap' => [
        'migrate' => [
            'class' => \yii\console\controllers\MigrateController::class,
            'interactive' => false,
            'migrationPath' => [
                '@app/migrations',
            ],
        ],
    ],
];

return $config;
