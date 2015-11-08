<?php
session_start();
date_default_timezone_set('Europe/Kiev');

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/functions/functions.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = !empty($pathParts[1]) ? $pathParts[1] : 'News';
$act = !empty($pathParts[2]) ? $pathParts[2] : 'All';

$controllerClassName = 'Application\\Controllers\\' . $ctrl;

try {
    $controller = new $controllerClassName;
    $method = 'action' . $act;
    $controller->$method();
} catch (E404Ecxeption $e) {
    $view = new View();
    $view->error = $e->getMessage();
    $view->code = $e->getCode();
    $view->display('../error/error.php');
    file_put_contents(__DIR__ . '../error/error.txt', date("H:i:s Y-m-d") . ", " . $e->getMessage() . ", " . $e->getCode() . ", " . $e->getFile() . "\n", FILE_APPEND);
}