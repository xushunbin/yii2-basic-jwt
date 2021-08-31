<?php

require __DIR__ . '/../vendor/autoload.php';

defined('YII_ENV') or define('YII_ENV', 'prod');

$dotenv = \Dotenv\Dotenv::createUnsafeImmutable('../environments', '.env.' . YII_ENV);
$dotenv->safeLoad();

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', getenv('DEBUG'));

defined('YII_ENV_LOCAL') or define('YII_ENV_LOCAL', YII_ENV === 'local');

require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
