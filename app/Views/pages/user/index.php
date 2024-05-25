<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
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

            <!-- isi dengan my profile -->
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
            <!-- myReview -->
            <div class="komentar">
                <?php $i = 1; ?>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Review</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($review as $r) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $r['judul']; ?></td>
                            <td>
                                <?php
                                if ($r['review'] == null) {
                                    echo "Belum ada review";
                                } else {
                                    echo $r['review'];
                                }
                                ?>

                                <div id="sembunyi" style="display: none;">
                                    <form action="/review/edit" method="post" enctype="multipart/form-data">
                                        <div class="card-footer py-3 border-0">
                                            <div class=" d-flex flex-start w-100">
                                                <div data-mdb-input-init class="form-outline w-100">
                                                    <textarea class="form-control" name="review" id="review" rows="4" value="<?= $r['review']; ?>"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="id_review" name="id_review" value="<?= $r['id_review']; ?>">
                                        <input type="hidden" id="user_id" name="user_id" value="<?= $r['user_id']; ?>">
                                        <script>
                                            function myfunc() {
                                                var x = document.getElementById("sembunyi");
                                                if (x.style.display != "none") {
                                                    x.style.display = "none";
                                                } else {
                                                    x.style.display = "block";
                                                }
                                            }
                                        </script>
                                        <div class="float-end mt-2 pt-1">
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm">Simpan</button>
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-sm">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <!-- <a href="/review/edit/" class="btn btn-warning">Edit</a> -->
                                <button class="btn btn-warning" onclick="myfunc()" class="mt-3">Edit review</button>

                                <form action="/user/<?= $r['id_review']; ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakkah anda yakin?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
    </div>
    <?= $this->endSection(); ?>