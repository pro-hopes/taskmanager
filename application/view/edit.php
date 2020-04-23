<main>
    <div class="container py-5"></div>
    <div class="container bg-white p-3 border">
        <form action="/tasks/<?php if ($data['type'] == 'add'): ?>add<?php elseif ($data['type'] == 'edit'): ?>edit<?php endif; ?>" method="post" class="row">
            <!-- hidden -->
            <?php if ($data['type'] == 'edit'): ?>
                <input type="hidden" name="id" value="<?= $data['model']['id']?>">
            <?php endif; ?>
            <!-- endhidden -->
            <div class="col-md-12">
                <div class="form-group">
                    <label class = "text-semibold">Имя пользователя:
                        <?php if ($data['type'] == 'edit'): ?>
                            <span class="font-weight-bold"><?= html($data['model']['name'])?></span>
                        <?php endif; ?>
                    </label>
                    <?php if ($data['type'] == 'add'): ?>
                        <input type = "text" name="name" class="form-control" value="" required = "required" placeholder="Введите имя">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class = "text-semibold">E-mail пользователя:
                         <?php if ($data['type'] == 'edit'): ?>
                             <span class="font-weight-bold"><?= html($data['model']['email'])?></span>
                         <?php endif; ?>
                    </label>
                    <?php if ($data['type'] == 'add'): ?>
                        <input type = "email" name="email" class="form-control" value="" required = "required" placeholder="Введите email">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-group mb-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Текст задачи</span>
                    </div>
                    <?php if ($data['type'] == 'add'): ?>
                        <textarea class="form-control" name="text" aria-label="With textarea"></textarea>
                    <?php endif; ?>
                    <?php if ($data['type'] == 'edit'): ?>
                        <textarea class="form-control" name="text" aria-label="With textarea"><?= html($data['model']['text'])?></textarea>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Статус</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="status">
                        <option <?php if (isset($data['model']) AND $data['model']['status'] == 0): ?>
                            selected
                        <?php endif; ?> value="0">Не выполнено</option>
                        <option <?php if (isset($data['model']) AND $data['model']['status'] == 1): ?>
                            selected
                        <?php endif; ?> value="1">Выполнено</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-end">
                <input type="submit" value="Применить" class="btn btn-success  py-2 px-3 rounded">
            </div>
        </form>
    </div>
</main>
