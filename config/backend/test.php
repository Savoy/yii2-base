<?php
/**
 * Application configuration shared by all test types
 */

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../test.php',
    require __DIR__ . '/main.php'
);

return yii\helpers\ArrayHelper::merge(
    $config,
    [
        'id' => 'app-tests-backend',
        'language' => 'en-US',
        'components' => [
            'assetManager' => [
                'basePath' => __DIR__ . '/../../web/secure/assets',
            ],
            'user' => [
                'class' => \yii\web\User::class,
                'identityClass' => \app\models\User::class,
            ],
        ],
    ]
);
