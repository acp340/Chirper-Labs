<?php

$check = strtok($_SERVER["REQUEST_URI"], '?');
if(file_exists("." . $check)){
  return false;
}

require_once 'include/config.php';
require_once 'include/util.php';

function routeUrl() {

  $method = $_SERVER['REQUEST_METHOD'];
  $requestURI = explode('/', $_SERVER['REQUEST_URI']);
  $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);

  for ($i = 0; $i < sizeof($scriptName); $i++) {
    if ($requestURI[$i] == $scriptName[$i]) {
      unset($requestURI[$i]);
    }
  }
  # continued...

  $entity = array_values($requestURI);
  if(empty($entity[0])){
    header("Location: /index");
    die();
  }
  $controller = 'controllers/' . $entity[0] . '.php';
  $func = strtolower($method) . '_' . (isset($entity[1]) ? $entity[1] : 'index');
  $params = array_slice($entity, 2);

  if (!file_exists($controller)) {
    errorPage(404, "Controller '$controller' doesn't exist. Did you create it?");
  }

  require $controller;
  if (!function_exists($func)) {
    errorPage(404, "Function '$func' doesn't exist in controller '$controller'. Did you create it?");
  }

  call_user_func_array($func, $params);
  errorPage(501, "It looks like you're not redirecting or rendering a template in <code>$func()</code> in the <code>$controller</code> controller");
  exit();
}

date_default_timezone_set('America/New_York');

// note, GDPR says that you need to notify about cookies like this.
//session_set_cookie_params(60*60*24*14, '/', $_SERVER['SERVER_NAME'], true, false);
session_start();

routeUrl();
