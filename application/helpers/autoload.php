<?php

function autoload($class)
{
    $path = str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require $path;
    }
}
spl_autoload_register('autoload');
