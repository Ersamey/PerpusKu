<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="label">
<div class="container">
    <form action="https://formsubmit.co/sitinuraeni8754@gmail.com" method="POST">
        <div class="row justify-content-between">
            <div class="col-md-6 ">
                <div class=" mb-4 ml-2">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="phone" class="form-label">No Telepon</label>
                    <input type="text" class="form-control" id="phone" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea class="form-control" id="message" rows="3"></textarea>
                </div>
                <button type="submit" class="btn-contact">Send</button>
            </div>
    </form>
            <div class="col-md-4">
                <h1 class="display-4 gradient-text-contact">Contact Us</h1>
                <div class="col pt-4">
                    <p>Silahkan hubungi kontak yang tertera  apabila terdapat keluhan ataupun pertanyaan!!</p>
                    <div class="icon-link d-block mb-3 pt-3">
                        <img src="<?= base_url() ?>/img/map.png" alt="map" width="34px" height="45px">
                        <span class="text-muted">
                        <a href="https://maps.app.goo.gl/LkRtvP7mnR78vQHy8">
                            Jl.Gegerkalong, Sukasari, Bandung
                        </a>
                        </span>
                    </div>
                    <div class="icon-link d-block mb-3 pt-3">
                        <img src="<?= base_url() ?>/img/phone.png" alt="phone" width="43px" height="43px">
                        <span>+123-456-7890</span>
                    </div>
                    <div class="icon-link d-block mb-3 pt-3">
                        <img src="<?= base_url() ?>/img/whatsapp.png" alt="whatsapp" width="40px" height="40px">
                        <span>0812-3456-7890</span>
                    </div>
                    <div class="icon-link d-block mb-3 pt-3">
                        <img src="<?= base_url() ?>/img/instagram.png" alt="instagram" width="37px" height="37px">
                        <span class="text-muted">
                    <a href="https://instagram.com/enn_0204 ">
                        @perpusku
                    </a>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>