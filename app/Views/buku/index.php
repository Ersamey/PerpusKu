<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="bg-belakang">
<div class="list-buku-home">  
<div class="container">
    <div class="row">
        <div class="col">
        <h1 class="h1-listbuku pt-1 mb-4">Mau Baca Buku Apa Hari Ini?</h1>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control mt-2" placeholder="Cari buku" name="keyword">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary" name="submit">Search</button>
                    </div>
                </div>
            </form>

            <br>

            <h1 class="h1-listbuku mb-4">DAFTAR BUKU</h1>
            <?php if (in_groups('admin')) : ?>
                <a href="/buku/add" class="btn btn-primary">Tambah Buku</a>
            <?php endif; ?>
            <div class="d-flex flex-wrap">
                <?php foreach ($buku as $b) :  ?>
                    <div class="card m-2" style="width: 12rem;">
                        <img class="card-img-top" src="/img/<?= $b['pict'] ?>" alt="Card image cap">
                        <div class="card-body d-flex flex-column">
                            <b class="mb-2"><?= $b['judul'] ?></b>
                            <div class="mt-auto">
                                <?php if (in_groups('admin')) : ?>
                                    <form action="/buku/<?= $b['id_buku']; ?>" method="post" style="display:inline;">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type=" submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Delete</button>
                                    </form>
                                <?php endif; ?>
                                <a href="/buku/<?= $b['slug']; ?>" class=" btn btn-success">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>