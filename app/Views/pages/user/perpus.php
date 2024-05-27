<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="head">
                <h1><?= $perpustakaan['nama']; ?></h1>
                <p><?= $perpustakaan['alamat']; ?></p>
            </div>
            <div class="body d-flex flex-wrap">
                <?php foreach ($ketersediaan as $k) : ?>
                    <div class="card m-2" style="width: 12rem;">
                        <img class="card-img-top" src="/img/<?= $k['pict'] ?>" alt="Card image cap">
                        <div class="card-body d-flex flex-column">
                            <b class="mb-2"><?= $k['judul'] ?></b>
                            <div class="mt-auto">
                                <a href="/buku/<?= $k['slug']; ?>" class="btn btn-success">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>