<?php
set_include_path(
    __DIR__ . '/lib' . PATH_SEPARATOR
    . __DIR__ . '/src' . PATH_SEPARATOR
    . __DIR__ . '/ui'
);

require 'Lcobucci/ActionMapper2/ClassLoader/SplClassLoader.php';

use \Lcobucci\ActionMapper2\ClassLoader\SplClassLoader;

$loader = new SplClassLoader();
$loader->register();