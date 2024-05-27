<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Mau Baca Buku Apa Hari Ini?</h1>
            <form action="">
                <input type="text" placeholder="Cari Buku" class="form-control mt-2" style="width: 50%; display: inline;">
                <button class="btn btn-primary">Search</button>
            </form>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Autem nihil minus, quasi eum perspiciatis fugiat inventore
                commodi amet necessitatibus sint perferendis pariatur
                excepturi aut labore eveniet at, quam repudiandae quis.</p>
            <br>


            <h1 class=" mt-2">Daftar Buku</h1>
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
<?= $this->endSection(); ?>