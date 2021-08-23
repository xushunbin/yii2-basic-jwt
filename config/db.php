<?php
return [
    'class'    => 'yii\db\Connection',
    'dsn'      => 'mysql:host=' . getenv('MYSQL_HOST') . ':port:' . getenv('MYSQL_PORT') . ';dbname=' . getenv('MYSQL_DB'),
    'username' => getenv('MYSQL_USER'),
    'password' => getenv('MYSQL_PWD'),
    'charset'  => getenv('MYSQL_CHARSET'),

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
