<?php

chdir(__DIR__);

$loader = null;

if (file_exists('../../../vendor/autoload.php')) {
    $loader = include '../../../vendor/autoload.php';
} elseif (file_exists('../../../autoload.php')) {
    $loader = include '../../../autoload.php';
} else {
    throw new RuntimeException('vendor/autoload.php could not be found. Did you run `php composer.phar install`?');
}

// This doesn't seem like the right way to do this...
$loader->add('ZfcUserTest', __DIR__ . '/../../../vendor/zf-commons/zfc-user/tests/');

// Load UserProfile Tests
$loader->add('ZfcUserProfileTest', __DIR__);

if (!$config = @include 'configuration.php') {
    $config = require 'configuration.php.dist';
}
