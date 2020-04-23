<?php
use application\model\Tokens;

function checkAuth()
{
    $model = new Tokens;

    if (!isset($_SESSION['password']) AND !isset($_SESSION['login'])) {
        // header("Location: " .  $_SERVER['HTTP_ORIGIN'] . "/user/authorize/?auth-error=yes");
        return false;
    }
    $result = $model->select()->where(['login' => $_SESSION['login'],
                                      'password' => $_SESSION['password']])->take();

    if (empty($result)) {
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        // header("Location: " .  $_SERVER['HTTP_ORIGIN'] . "/user/authorize/?auth-error=yes");
        return false;
    }

    return true;
}
