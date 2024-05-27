<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Manajemen Buku</h1>
            <!-- Button to open the form -->
            <button class="btn btn-primary" onclick="toggleForm()">Tambah Buku</button>

            <div id="bookForm" class="sembunyi" style="display: none;">
                <div class=" mt-3">
                    <h2>Daftar Buku</h2>
                    <div class="d-flex flex-wrap">
                        <?php foreach ($buku as $b) : ?>
                            <div class="card m-2" style="width: 10rem;">
                                <img class="card-img-top" src="/img/<?= $b['pict'] ?>" alt="Card image cap">
                                <div class="card-body d-flex flex-column">
                                    <b class="mb-2"><?= $b['judul'] ?></b>
                                    <form action="/tersedia/add" method="post" class="mt-auto">
                                        <input type="hidden" name="buku_id" value="<?= $b['id_buku'] ?>">
                                        <input type="hidden" name="perpus_id" value="<?= user_id(); ?>">
                                        <button type="submit" class="btn btn-success w-100">+ Add</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <h2>Manajemen Buku</h2>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($list as $l) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $l['judul'] ?></td>
                                <td><?= $l['pengarang'] ?></td>
                                <td><?= $l['status'] ?></td>
                                <td>
                                    <button class="btn btn-primary" onclick="toggleRoleForm(<?= $l['id_buku']; ?>)">Ubah Role</button>
                                    <div class="role" id="roleForm-<?= $l['id_buku']; ?>" style="display: none;">
                                        <form action="/tersedia/save" method="post">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="perpus_id" value="<?= $l['id_perpus']; ?>">
                                            <input type="hidden" name="buku_id" value="<?= $l['id_buku']; ?>">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="status1" value="Tersedia">
                                                <label class="form-check-label" for="status1">
                                                    Tersedia
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="status2" value="Tidak Tersedia">
                                                <label class="form-check-label" for="status2">
                                                    Tidak Tersedia
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status" id="status3" value="Dipinjam">
                                                <label class="form-check-label" for="status3">
                                                    Dipinjam
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleForm() {
        var form = document.getElementById('bookForm');
        if (form.style.display === 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }

    function toggleRoleForm(id) {
        var form = document.getElementById('roleForm-' + id);
        if (form.style.display === 'none') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
</script>

<?= $this->endSection(); ?>