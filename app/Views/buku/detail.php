<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="detail">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-10">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/img/<?= $buku['pict'] ?>" class="img-fluid " alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body d-block">
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('pesan'); ?>
                                    </div>
                                <?php endif; ?>
                                <h5 class="card-title"><?= $buku['judul']; ?></h5>
                                <p class="card-text"><b>Penulis: </b><?= $buku['pengarang']; ?> - <?= $buku['tahun']; ?></p>
                                <h4 class="tersedia">Tersedia di : </h4>
                                <?php foreach ($tersedia as $t) : ?>
                                    <form action="/perpustakaan/detail" method="post">
                                        <input type="hidden" name="id_perpus" value="<?= $t['id_perpus']; ?>">
                                        <img src="/img/maps.png" alt="" width="50rem">
                                        <button type="submit" class="plain-button nama"><a class="plain-link"><b><?= $t['nama']; ?></b></a></button>
                                    </form>
                                    <p class="card-text alamat"><?= $t['alamat']; ?></p>
                                <?php endforeach; ?>
                                <div class="center-container">
                                    <a href="/komentar/<?= $buku['slug']; ?>" class="btn btn-detail">Ulasan</a>

                                    <?php if (in_groups('admin')) : ?>
                                        <a href="/buku/edit/<?= $buku['id_buku']; ?>" class="btn btn-warning editbuku">Edit</a>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                + Lokasi
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <?php foreach ($perpus as $p) : ?>
                                                    <form action="/tersedia/tempat" method="post" style="margin: 0;">
                                                        <input type="hidden" name="id_buku" value="<?= $buku['id_buku'] ?>">
                                                        <input type="hidden" name="id_perpus" value="<?= $p['id_perpus'] ?>">

                                                        <button type="submit" class="dropdown-item dropdown-item-button"><?= $p['nama']; ?></button>
                                                    </form>
                                                <?php endforeach; ?>
                                            </div>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>


        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>