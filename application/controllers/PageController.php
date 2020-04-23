<?php
namespace application\controllers;
use application\system\View;
use application\model\Tasks;
/**
 *
 */
class PageController
{
    public function actionEdit()
    {
        if (!isset($_GET['id'])) {
            header("Location: " .  $_SERVER['HTTP_ORIGIN'] . "/page/add");
            return;
        }
        $data['type'] = "edit";
        $model = new Tasks;
        $result = $model->select()->where(["id" => $_GET['id']])->take();
        $data['model'] = $result[0];
        View::render('edit', $data);
    }
    public function actionAdd()
    {
        $data['type'] = "add";
        View::render('edit', $data);
    }
    public function actionMain()
    {
        $model = new Tasks;
        $count = $model->count()->take();
        $model->select();
        if (isset($_GET['sort'])) {
            if ($_GET['sort-type'] === 'ASC') {
                $sortType = "ASC";
            } else {
                $sortType = "DESC";
            }
            $model->order($_GET['sort'], $sortType);
        }
        if (isset($_GET['page'])) {
            $el = pageFirstEl($_GET['page']);
            $model->limit($el);
        } else {
            $model->limit(0);
        }
        $model = $model->take();
        $data['model'] = $model;
        $data['elCount'] = ceil($count[0]['count']/3);
        View::render('main', $data);
    }
}
