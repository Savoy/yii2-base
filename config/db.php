<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . ($_ENV['MYSQL_HOST'] ?? getenv('MYSQL_HOST')) . ';dbname=' . ($_ENV['MYSQL_DATABASE'] ?? getenv('MYSQL_DATABASE')),
    'username' => $_ENV['MYSQL_USER'] ?? getenv('MYSQL_USER'),
    'password' => $_ENV['MYSQL_PASSWORD'] ?? getenv('MYSQL_PASSWORD'),
    'charset' => 'utf8',
    // Schema cache options (for production environment)
    'enableSchemaCache' => YII_ENV_PROD,
    'schemaCacheDuration' => 60 * 60, //1h
    'schemaCache' => 'cache',
];
