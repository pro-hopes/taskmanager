<main>
    <?php if (isset($data['auth']) AND $data['auth']): ?>
        <div class="container py-5">
            <div class="row pt-5 d-flex justify-content-center">
                <div class="col-md-6 text-white bg-success px-3 py-2 d-flex justify-content-between">
                    <span>
                        Вы авторизированы!
                    </span>
                    <a href="" class="close-btn text-white">
                        Закрыть
                    </a>
                </div>
                <script>
                    $('.close-btn').click(function(ev) {
                        ev.preventDefault();
                        $(this).parent().parent().remove();
                    })
                </script>
            </div>
        </div>
    <?php else: ?>
        <div class="container py-5">
            <?php if (isset($data['error']) and $data['error'] === true): ?>
            <div class="row pt-5 d-flex justify-content-center">
                <div class="col-md-6 text-white bg-danger px-3 py-2 d-flex justify-content-between">
                    <span>
                        <?= $data['errorText'] ?>
                    </span>
                    <a href="" class="close-btn text-white">
                        Закрыть
                    </a>
                </div>
                <script>
                    $('.close-btn').click(function(ev) {
                        ev.preventDefault();
                        $(this).parent().parent().remove();
                    })
                </script>
            </div>
            <?php endif; ?>
        </div>
        <form action="/user/authorize" method="post" class="container bg-white p-3 border">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class = "text-semibold">Логин: </label>
                        <input type = "text" name="login" class="form-control" value="" required = "required" placeholder="Введите логин">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class = "text-semibold">Пароль:</label>
                        <input type = "password" name="password" class="form-control" value="" required = "required" placeholder="Введите пароль">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <input type="submit" value="Войти" class="btn btn-success col-3 py-2 px-3 rounded">
            </div>
        </form>
    <?php endif; ?>
</main>
