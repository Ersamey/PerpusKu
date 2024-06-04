<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="profil">
<div class="container">
    <div class="row">
        <div class="col">
            <!-- Logout -->
            <div class="logout mt-3">
                <a href="/logout" class="btn btn-danger">Logout</a>
            </div>
            <!-- Edit profile -->
            <div class="edit-profile mt-3">
                <button onclick="editfunct()" class="btn btn-warning">Edit Profile</button>
                <div id="myDIV" style="display: none;">
                    <h1>Hallo</h1>
                    <script>
                        function editfunct() {
                            var x = document.getElementById("myDIV");
                            if (x.style.display != "none") {
                                x.style.display = "none";
                            } else {
                                x.style.display = "block";
                            }
                        }
                    </script>
                </div>
            </div>

            <?php
            $username  =   user()->username;
            $email     =   user()->email;
            ?>
            <div class="profile mt-4">
                <table>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?= $username; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
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
                        <div class="card">
                            <div class="card-body">
                                <b>Nama:</b>
                                <p id="nama"><?= $perpustakaan['nama']; ?></p>
                                <button class="btn btn-warning" onclick="toggleEditForm('formNama')">Edit</button>
                                <form id="formNama" action="/home/editNama" method="post" style="display: none;">
                                    <input type="text" name="nama" value="<?= $perpustakaan['nama']; ?>">
                                    <input type="hidden" name="id_perpus" value="<?= $perpustakaan['id_perpus']; ?>">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <b>Alamat:</b>
                                <p id="alamat"><?= $perpustakaan['alamat']; ?></p>
                                <button class="btn btn-warning" onclick="toggleEditForm('formAlamat')">Edit</button>
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