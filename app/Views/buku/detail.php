<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $buku['pict'] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $buku['judul']; ?></h5>
                            <p class="card-text"><b>Penulis: </b><?= $buku['pengarang']; ?>- <?= $buku['tahun']; ?></p>
                            <?php foreach ($tersedia as $t) : ?>
                                <p class="card-text"> <b><?= $t['nama']; ?></b></p>

                                <p class="card-text"></b><?= $t['alamat']; ?>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>