<main>
    <div class="container py-5">
        <div class="row pt-5 d-flex justify-content-center">
            <div class="col-md-6 text-white bg-<?= $data['mesColor']?> px-3 py-2 d-flex justify-content-between">
                <span>
                    <?= $data['mesText']?>
                </span>
                <a href="/" class="close-btn text-white">
                    К списку
                </a>
            </div>
            <script>
            // $('.close-btn').click(function(ev) {
            //     ev.preventDefault();
            //     $(this).parent().parent().remove();
            // })
            </script>
        </div>
    </div>
</main>
