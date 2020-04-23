<?php
namespace application\controllers;
use application\system\View;
use application\model\Users;
use application\model\Tokens;


class UserController
{
    public function actionAuthorize()
    {
        if (checkAuth()) {
            View::render('authorization', ['auth' => true]);
            return;
        }
        if (isset($_GET['auth-error'])) {
            View::render("authorization", ["error" => true,
                                           "errorText" => "Вы не авторизированы!"]);
            return;
        }
        if (isset($_POST['login']) AND isset($_POST['password'])) {
            $model = new Users;
            $userData = $model->select("login, password")->where(["login" => $_POST['login']])->take();
            if (!empty($userData)) {
                $userData = $userData[0];
            } else {
                View::render("authorization", ["error" => true,
                                               "errorText" => "Неправильный логин или пароль"]);
            return;
            }
            if (password_verify($_POST['password'], $userData['password'])) {
                // LOGGED
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $password;
                $token = new Tokens;
                $token->delete(['login'=> $_POST['login']]);
                $token->insert(['login' => $_POST['login'],
                                'password' => $password])->run();
                header("Location: " .  $_SERVER['HTTP_ORIGIN'] . "/user/authorize");
            } else {
                View::render("authorization", ["error" => true,
                                               "errorText" => "Неправильный логин или пароль"]);
            }
        } else {
            View::render('authorization');
        }
    }

    public function actionLogout()
    {
        $token = new Tokens;
        $token->delete(['login' => $_SESSION['login']]);
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        header("Location: " .  $_SERVER['HTTP_ORIGIN'] . "/");

    }
}
