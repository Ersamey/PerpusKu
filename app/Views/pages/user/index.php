<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="profil bg-belakang">
    <div class="container">
        <div class="row">
            <div class="col mb-4">
                <h1 class="gradient-text mt-4 pt-4">My Profil</h1>


                <div class="card-kartu shadow-lg p-3 mb-3">
                    <div class="card-body">
                        <?php
                        $username  =   user()->username;
                        $email     =   user()->email;
                        ?>
                        <div class="profile">
                            <table>
                                <tr>
                                    <td><b>Username</b></td>
                                    <td>:</td>
                                    <td><?= $username; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td>:</td>
                                    <td><?= $email; ?></td>
                                </tr>
                            </table>
                        </div>
                        <br><br>
                        <?php
                        if (in_groups('perpustakaan')) { ?>
                            <div>
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('pesan'); ?>
                                    </div>
                                <?php endif;
                                if ($perpustakaan != null) : ?>
                                    <h4 class="pt-1">Lokasi</h4>
                                    <b>Nama:</b>
                                    <p id="nama"><?= $perpustakaan['nama']; ?></p>
                                    <button class="btn mb-2 mt-1" style="background-color:#374cde; color: white;" onclick="toggleEditForm('formNama')">Edit</button>
                                    <form id="formNama" action="/home/editNama" method="post" style="display: none;">
                                        <input type="text" name="nama" value="<?= $perpustakaan['nama']; ?>">
                                        <input type="hidden" name="id_perpus" value="<?= $perpustakaan['id_perpus']; ?>">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                    <br> <b>Alamat:</b></br>
                                    <p id="alamat"><?= $perpustakaan['alamat']; ?></p>
                                    <button class="btn" style="background-color:#374cde; color: white;" onclick="toggleEditForm('formAlamat')">Edit</button>
                                    <form id="formAlamat" action="/home/editAlamat" method="post" style="display: none;">
                                        <input type="text" name="alamat" value="<?= $perpustakaan['alamat']; ?>">
                                        <input type="hidden" name="id_perpus" value="<?= $perpustakaan['id_perpus']; ?>">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                            </div>
                    </div>
                <?php else : ?>
                    <p>Anda belum memiliki profile</p>
                    <button type="submit" onclick="toggleEditForm('addProfile')" class=" btn btn-success d-block">+ Add</button>
                    <div class="card">
                        <div class="card-body">
                            <b>Nama:</b>
                            <form id=" addProfile" action="/home/addProfile" method="post">
                                <!-- <textera name="nama"> </textera> buat input yang luas-->
                                <textarea name="nama" id=""></textarea>
                                <input type="hidden" name="id_perpus">
                                <b class="d-block">Alamat:</b>
                                <textarea name="alamat" id=""></textarea>
                                <input type="hidden" name="user_id" value="<?= user_id(); ?>">
                                <button type="submit" class="btn btn-primary d-block mt-3">Save</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
                <script>
                    function toggleEditForm(formId) {
                        var form = document.getElementById(formId);
                        if (form.style.display != "none") {
                            form.style.display = "none";
                        } else {
                            form.style.display = "block";
                        }
                    }
                </script>

            </div>
        <?php } ?>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>