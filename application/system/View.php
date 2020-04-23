<?php
namespace application\system;

class View
{

    public static function render($path, $data = [])
    {
        $fullPath = $_SERVER['DOCUMENT_ROOT'] .'/application/view/' . $path .'.php';
        if (!file_exists($fullPath)) {
            throw new \ErrorException('view is not founded');
        }
        include $fullPath;
    }
}
