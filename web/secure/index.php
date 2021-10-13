<?php

defined('YII_DEBUG') or define('YII_DEBUG', $_ENV['YII_DEBUG'] ?? false);
defined('YII_ENV') or define('YII_ENV', $_ENV['YII_ENV'] ?? 'prod');

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../config/common.php',
    require __DIR__ . '/../../config/backend/main.php'
);

(new yii\web\Application($config))->run();
