<?php
\Dotenv\Dotenv::create(dirname(__FILE__) . '/../')->load();

$config = [
    'basePath' => dirname(__DIR__),
    'language' => 'ru',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(__DIR__) . '/vendor',
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
        'redis' => [
            'class' => \yii\redis\Connection::class,
            'hostname' => $_ENV['REDIS_HOST'] ?? getenv('REDIS_HOST'),
            'port' => $_ENV['REDIS_PORT'] ?? getenv('REDIS_PORT'),
            'unixSocket' => ($_SERVER['REDIS_SOCK'] ?? getenv('REDIS_SOCK')),
            'database' => 0,
        ],
        'cache' => [
            'class' => \yii\redis\Cache::class,
        ],
        'fileCache' => [
            'class' => \yii\caching\FileCache::class,
        ],
        'authManager' => [
            'class' => \yii\rbac\DbManager::class,
            'cache' => YII_ENV_PROD ? 'cache' : null,
        ],
        'mailer' => [
            'class' => \yii\swiftmailer\Mailer::class,
            'useFileTransport' => YII_ENV_DEV,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => $_ENV['SMTP_HOST'] ?? getenv('SMTP_HOST'),
                'port' => $_ENV['SMTP_PORT'] ?? getenv('SMTP_PORT'),
                'encryption' => $_ENV['SMTP_ENCRYPTION'] ?? getenv('SMTP_ENCRYPTION'),
                'username' => $_ENV['SMTP_USERNAME'] ?? getenv('SMTP_USERNAME'),
                'password' => $_ENV['SMTP_PASSWORD'] ?? getenv('SMTP_PASSWORD'),
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => require __DIR__ . '/params.php',
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;
