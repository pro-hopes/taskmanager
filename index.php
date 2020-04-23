<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/application/lib/dev.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/application/helpers/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/application/helpers/checkAuth.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/application/helpers/pageFirstEl.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/application/helpers/rexss.php';
    session_start();


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css">
    <script src="/public/js/jquery-3.5.0.min.js" charset="utf-8"></script>
    <script src="/public/js/bootstrap.min.js" charset="utf-8"></script>
</head>
<body class="bg-light pb-4">
    <header class="p-1" style="background-color: #3f74a2;">
        <div class="container p-2">
            <div class="justify-content-between d-flex">
                <a href="/" class="text-white font-weight-bold">Главная</a>
                <?php if (checkAuth()): ?>
                    <a href="/user/logout" class="text-white font-weight-bold">ВЫЙТИ</a>
                <?php else: ?>
                    <a href="/user/authorize" class="text-white font-weight-bold">ВОЙТИ</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <?php
     application\system\App::run();
    ?>
</body>
</html>
