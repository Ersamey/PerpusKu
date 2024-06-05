<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="bg-belakang">
    <div class="review">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="gradient-text">ULASAN BUKU</h1>
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>

                    <button onclick="myFunction()" class=" btn-add mt-3">Tambahkan review</button>
                    <div id="myDIV" style="display: none;">
                        <form action="/review/save" method="post" enctype="multipart/form-data">
                            <div class="card-footer py-3 border-0">
                                <div class="d-flex flex-start w-100">
                                    <div data-mdb-input-init class="form-outline w-100">
                                        <textarea class="form-control" name="review" rows="4" placeholder="Tuliskan komentar anda!" style="background: #fff;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="<?= user_id(); ?>">
                            <input type="hidden" name="buku_id" value="<?= $buku['id_buku']; ?>">
                            <div class="float-end mt-2 pt-1">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm mb-3">Post comment</button>
                                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-sm mb-3" onclick="myFunction()">Cancel</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-body mt-4">
                        <?php foreach ($komentar as $k) : ?>
                            <div class="card-review mt-2">
                                <h5 class="card-title ml-2"><?= $k['username']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted ml-2"><?= $k['email']; ?></h6> <!-- ini boleh dihapus jika tidak perlu -->
                                <p class="card-text ml-2"><?= $k['review']; ?></p>
                                <div id="sembunyi-<?= $k['id_review']; ?>" style="display: none;">
                                    <form action="/review/edit" method="post" enctype="multipart/form-data">
                                        <div class="card-footer py-3 border-0">
                                            <div class="d-flex flex-start w-100">
                                                <div data-mdb-input-init class="form-outline w-100">
                                                    <textarea class="form-control" name="review" rows="4"><?= $k['review']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_review" value="<?= $k['id_review']; ?>">
                                        <div class="float-end mt-2 pt-1">
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm">Simpan</button>
                                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-sm" onclick="hideForm('sembunyi-<?= $k['id_review']; ?>')">Batal</button>
                                        </div>
                                    </form>
                                </div>
                                <?php if (logged_in()) : ?>
                                    <?php if (user_id() == $k['user_id']) : ?>
                                        <button class="btn btn-warning" onclick="showForm('sembunyi-<?= $k['id_review']; ?>')" class="mt-3">Edit</button>
                                        <form action="/user/<?= $k['id_review']; ?>" method="post" style="display:inline;">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Delete</button>
                                        </form>
                                    <?php elseif (in_groups('admin')) : ?>
                                        <form action="/user/<?= $k['id_review']; ?>" method="post" style="display:inline;">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger ml-2 mb-2" onclick="return confirm('Apakah anda yakin?');">Delete</button>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>

                        <script>
                            function showForm(id) {
                                var x = document.getElementById(id);
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display = "none";
                                }
                            }

                            function hideForm(id) {
                                var x = document.getElementById(id);
                                x.style.display = "none";
                            }

                            function myFunction() {
                                var x = document.getElementById("myDIV");
                                if (x.style.display === "none") {
                                    x.style.display = "block";
                                } else {
                                    x.style.display = "none";
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>