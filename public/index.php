<?php

require '../vendor/autoload.php';

use MVC\Router;
use ScssPhp\ScssPhp\Compiler;

$scss = new Compiler();
$scss->setImportPaths('./style/scss');

try {
    $cssOutput = $scss->compileFile('./style/scss/main.scss');
} catch (\ScssPhp\ScssPhp\Exception\SassException $e) {
    throw new Error($e);
}

file_put_contents('./style/main.css', $cssOutput);

session_start();

$Router = new Router($_SERVER['REQUEST_URI']);

try {
    $Router->run();
} catch (Exception $e) {
    throw new Error($e);
}