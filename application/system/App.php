<?php
namespace application\system;

require $_SERVER['DOCUMENT_ROOT'] . "/application/helpers/actionCaller.php";
use application\system\View;
use application\system\Db;
use application\model\Tasks;
use application\model\Users;

class App
{
    public static function run()
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if ($path === '/') {
            callAction('page', 'main');
            return;
        }
        $pathParts = explode('/', $path);
        callAction($pathParts[1], $pathParts[2]);
    }
}
