<main>
    <div class="container py-5">
        <div class="row justify-content-end">
            <a href="/page/add" class="btn btn-success  py-2 px-3 rounded">Добавить задачу</a>
        </div>
        <!-- <div class="row pt-5">
            <div class="col-md-6 text-white bg-success px-3 py-2 d-flex justify-content-between">
                <span>
                    Задача успешно добавлена!
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
        </div> -->
    </div>
    <div class="container bg-white p-3 border">
        <form action="/" method="get" class="row pb-4">
            <div class="col-12 mb-3 text-dark font-weight-bold">Фильтры</div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Сортировать</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="sort">
                        <option <?php if (isset($_GET['sort-type']) AND $_GET['sort'] == 'name'): ?>
                            selected
                        <?php endif; ?> value="name">Имя пользователя</option>
                        <option <?php if (isset($_GET['sort-type']) AND $_GET['sort'] == 'email'): ?>
                            selected
                        <?php endif; ?> value="email">Email</option>
                        <option <?php if (isset($_GET['sort-type']) AND $_GET['sort'] == 'status'): ?>
                            selected
                        <?php endif; ?> value="status">Статус</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">По</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="sort-type">
                        <option <?php if (isset($_GET['sort-type']) AND $_GET['sort-type'] == 'ASC'): ?>
                            selected
                        <?php endif; ?> value="ASC">По возрастанию</option>
                        <option <?php if (isset($_GET['sort-type']) AND $_GET['sort-type'] == "DESC"): ?>
                            selected
                        <?php endif; ?> value="DESC">По убыванию</option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <input type="submit" value="Применить" class="btn btn-info">
                <?php if (isset($_GET['sort'])): ?>
                    <a href="/"  class="btn btn-light">Сбросить</a>
                <?php endif; ?>
            </div>
        </form>
        <div class="">
            <div class="row p-2">
                <div class="col-3 border-right font-weight-bold text-dark">Имя пользователя</div>
                <div class="col-3 border-right font-weight-bold text-dark">E-mail</div>
                <div class="col-6 font-weight-bold text-dark">Задача</div>
            </div>
        </div>
        <div class="border bg-light">
            <?php foreach ($data['model'] as $value): ?>
                <div class="row p-2">
                    <div class="col-3 border-right d-dlex align-items-center">
                        <div>
                            <?= html($value['name']) ?>
                        </div>
                        <?php if (checkAuth()): ?>
                            <a href="/page/edit/?id=<?=html($value['id'])?>" class="d-inline-block text-primary rounded">редактировать</a>
                        <?php endif; ?>
                    </div>
                    <div class="col-3 border-right"><?= html($value['email']) ?></div>
                    <div class="col-6">
                        <p><?= html($value['text']) ?></p>
                        <?php if ($value['status'] == 1): ?>
                            <div class="d-inline-block px-1 text-white rounded bg-success">Выполнено</div>
                        <?php endif; ?>
                        <?php if ($value['redacted']): ?>
                            <div class="d-inline-block px-1 text-muted rounded">Отредактировано администратором</div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="d-flex pt-3">
        <?php for ($i=1; $i <= $data['elCount']; $i++) : ?>
                <a
                    <?php if (isset($_GET['page']) AND $_GET['page'] != $i): ?>
                        href="/?page=<?= $i?><?php if (isset($_GET['sort'])){ ?>&sort=<?=html($_GET["sort"])?>&sort-type=<?=html($_GET['sort-type'])?><?php }; ?>"
                    <?php endif; ?>
                    <?php if (!isset($_GET['page']) AND $i != 1): ?>
                        href="/?page=<?= $i?><?php if (isset($_GET['sort'])){ ?>&sort=<?=html($_GET["sort"])?>&sort-type=<?=html($_GET['sort-type'])?><?php }; ?>"
                    <?php endif; ?>
                class="px-2"><?= $i?></a>
        <?php endfor; ?>
    </div>
    </div>
</main>
