<?php
$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
$db['dsn'] = 'mysql:host=' . ($_ENV['MYSQL_HOST'] ?? getenv('MYSQL_HOST')) . ';dbname=' . ($_ENV['MYSQL_DATABASE_TEST'] ?? getenv('MYSQL_DATABASE_TEST'));

return $db;
