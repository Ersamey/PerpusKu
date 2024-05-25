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
            <a href="/buku/add" class="btn btn-primary">Tambah Buku</a>
            <table class=" table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($buku as $b) :  ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $b['pict'] ?>" alt="" class="sampul"></td>
                            <td><?= $b['judul'] ?></td>
                            <td>
                                <?php if (in_groups('admin')) : ?>
                                    <form action="/buku/<?= $b['id_buku']; ?>" method="post" style="display:inline;">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type=" submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Delete</button>
                                    </form>
                                <?php endif; ?>
                                <a href="/buku/<?= $b['slug']; ?>" class=" btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>