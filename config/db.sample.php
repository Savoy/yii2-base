<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=mysql;dbname=yii2db',
    'username' => 'user',
    'password' => 'pass',
    'charset' => 'utf8',
    // Schema cache options (for production environment)
    'enableSchemaCache' => YII_ENV_PROD,
    'schemaCacheDuration' => 60 * 60, //1h
    'schemaCache' => 'cache',
];
