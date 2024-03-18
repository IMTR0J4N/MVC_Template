<?php

require '../vendor/autoload.php';

use MVC\Router;
use Leafo\ScssPhp\Compiler;

$scss = new Compiler();
$scss->setImportPaths('./style/scss');

$scssInput = file_get_contents('./style/scss/main.scss');
$cssOutput = $scss->compile($scssInput);

file_put_contents('./style/main.css', $cssOutput);

session_start();

$Router = new Router($_SERVER['REQUEST_URI']);

try {
    $Router->run();
} catch (Exception $e) {
    throw new Error($e);
}