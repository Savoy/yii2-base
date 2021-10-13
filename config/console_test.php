<?php

$config = require __DIR__ . '/console.php';

return yii\helpers\ArrayHelper::merge(
    $config,
    [
        'id' => 'app-console-test',
        'components' => [
            'db' => require __DIR__ . '/test_db.php',
        ],
    ]
);
