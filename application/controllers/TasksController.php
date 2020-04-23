<?php
namespace application\controllers;
use application\system\View;
use application\model\Users;
use application\model\Tasks;

/**
 *
 */
class TasksController
{
    public function actionAdd()
    {
        $model = new Tasks;
        if ($_POST['name'] == '' OR $_POST['email'] == '' OR $_POST['text'] == '') {
            View::render('message', ['mesColor' => 'danger',
                                     'mesText' => 'Введены некорректные данные!']);
            return;
        }
        $model->insert(['name' => $_POST['name'],
                        'email' => $_POST['email'],
                        'text' => $_POST['text'],
                        'status' => $_POST['status']])->run();
        View::render('message', ['mesColor' => 'success',
                                  'mesText' => 'Задача успешно добавлена!']);
    }
    public function actionEdit()
    {
        if (checkAuth()) {
            $model = new Tasks;
            $answer = $model->select()->where(['id' => $_POST['id']])->take();
            if (!empty($answer) AND $answer[0]['text'] !== $_POST['text']) {
                $redacted = 1;
            } else {
                $redacted = 0;
            }
            $result = $model->update($_POST['id'], ["status" => $_POST['status'],
                                          "redacted" => $redacted,
                                          "text" => $_POST['text']]);
            View::render('message', ['mesColor' => 'success',
                                     'mesText' => 'Успешно отредактировано!']);
        } else {
            View::render("authorization", ["error" => true,
                                           "errorText" => "Вы не авторизированы"]);
        }

    }
}
