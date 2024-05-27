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
            <br><br>
            <?php
            if (in_groups('perpustakaan')) {
                if (!empty($perpustakaan)) : ?>
                    <?php foreach ($perpustakaan as $p) : ?>
                        <div>
                            <p><?= $p['nama']; ?></p>
                            <p><?= $p['alamat']; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No data available</p>
            <?php endif;
            } ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>