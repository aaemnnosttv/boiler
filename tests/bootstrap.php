<?php
define('BOILER__TESTS_ROOT', __DIR__);
define('BOILER__ROOT', dirname(BOILER__TESTS_ROOT));
define('BOILER__SLUG', basename(BOILER__ROOT));
define('BOILER__ENTRYPOINT', BOILER__ROOT . '/' . BOILER__SLUG . '.php');


tests_add_filter('muplugins_loaded', function () {
    require_once BOILER__ENTRYPOINT;
});

