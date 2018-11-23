<?php
define('BOILER__TESTS_ROOT', __DIR__);
define('BOILER__ROOT', dirname(BOILER__TESTS_ROOT));
define('BOILER__SLUG', basename(BOILER__ROOT));
define('BOILER__ENTRYPOINT', BOILER__ROOT . '/' . BOILER__SLUG . '.php');

// Register the absolute path to the wp-config file for tests.
putenv(sprintf('WP_PHPUNIT__TESTS_CONFIG=%s', __DIR__ . '/wp-config.php'));

// Composer autoloader must be loaded before WP_PHPUNIT__DIR will be available
require_once dirname(__DIR__) . '/vendor/autoload.php';

// Give access to tests_add_filter() function.
require getenv('WP_PHPUNIT__DIR') . '/includes/functions.php';

tests_add_filter('muplugins_loaded', function () {
    require_once BOILER__ENTRYPOINT;
});

// Start up the WP testing environment.
require getenv('WP_PHPUNIT__DIR') . '/includes/bootstrap.php';
