<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $buku['pict'] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $buku['judul']; ?></h5>
                            <p class="card-text"><b>Penulis: </b><?= $buku['pengarang']; ?>- <?= $buku['tahun']; ?></p>
                            <?php foreach ($tersedia as $t) : ?>
                                <p class="card-text"> <b><?= $t['nama']; ?></b></p>

                                <p class="card-text"></b><?= $t['alamat']; ?>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card" style="width: 50rem;">
            <h5 class="card-header">Review</h5>
            <h5><?= $validation->listErrors(); ?></h5>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <?php foreach ($komentar as $k) : ?>
                    <div class="card mt-3">
                        <h5 class="card-title"><?= $k['username']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $k['email']; ?></h6> <!-- ini boleh di hapus kalo gk perlu -->
                        <p class="card-text"><?= $k['review']; ?></p>
                    </div>
                <?php endforeach; ?>
                <!-- <a href="/review/<?= $k['buku_id']; ?>" class="card-link btn btn-secondary mt-3">Tambahkan Review</a> -->
                <!-- <a href="#" class="card-link">Another link</a> -->
                <!-- <a href="#!" class="d-flex align-items-center me-3">
                    <i class="far fa-comment-dots me-2"></i>
                    <p class="mb-0">Comment</p>
                </a> -->
                <?php
                $user_id = user_id();
                $buku_id = $buku['id_buku'];
                ?>

                <button onclick="myFunction()" class="mt-3">Tambahkan review</button>
                <div id="myDIV" style="display: none;">
                    <form action="/review/save" method="post" enctype="multipart/form-data">
                        <div class="card-footer py-3 border-0">
                            <div class=" d-flex flex-start w-100">
                                <div data-mdb-input-init class="form-outline w-100">
                                    <textarea class="form-control" name="review" id="review" rows="4" placeholder="Tuliskan komentar anda!" style="background: #fff;"></textarea>
                                    <!-- <label class="form-label" for="textAreaExample">Message</label> -->
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>">
                        <input type="hidden" id="buku_id" name="buku_id" value="<?php echo $buku_id; ?>">
                        <script>
                            function myFunction() {
                                var x = document.getElementById("myDIV");
                                if (x.style.display != "none") {
                                    x.style.display = "none";
                                } else {
                                    x.style.display = "block";
                                }
                            }
                        </script>
                        <div class="float-end mt-2 pt-1">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-sm">Post comment</button>
                            <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary btn-sm">Cancel</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
<?= $this->endSection(); ?>