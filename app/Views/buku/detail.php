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
        <div class="card" style="width: 50rem;">
            <h5 class="card-header">Review</h5>
            <div class="card-body">
                <?php foreach ($komentar as $k) : ?>
                    <div class="card">
                        <h5 class="card-title"><?= $k['username']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $k['email']; ?></h6> <!-- ini boleh di hapus kalo gk perlu -->
                        <p class="card-text"><?= $k['review']; ?></p>
                    </div>
                <?php endforeach; ?>
                <a href="/review/<?= $k['buku_id']; ?>" class="card-link btn btn-secondary mt-3">Tambahkan Review</a>
                <!-- <a href="#" class="card-link">Another link</a> -->
            </div>
        </div>

    </div>
</div>
</div>
<?= $this->endSection(); ?>