<?php
function callAction($controller, $action)
{
    $controller = 'application\\controllers\\' . ucfirst($controller) . 'Controller';
    if (!class_exists($controller)) {
        throw new \ErrorException('Controller is not founded');
    }
    $controller = new $controller;
    $action = 'action' . ucfirst($action);
    if (!method_exists($controller, $action)) {
        throw new \ErrorException('Action is not founded');
    }
    $controller->$action();
}
