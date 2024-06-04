<?= $this->extend ('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="bg-belakang ">
<div class="container">
    <div class="row mt-3">
        <div class="col-12 mb-1">
        <h1 class="gradient-text mt-5 pt-4">Silahkan Tambahkan Buku</h1>
            <button onclick="addForm()" class="btn-addform">+addForm</button>
        </div>

        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <form action="/buku/save" method="post" enctype="multipart/form-data" id="main-form">
        <?= csrf_field(); ?>
        <div class="row mt-3" id="form-container">
            <!-- Form pertama yang muncul sebelum klik tambah -->
            <div class="col-md-4 mt-1 mb-2">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <div class="mb-1">
                            <label for="judul[]" class="form-label">Judul</label>
                            <input type="text" name="judul[]" class="form-control" id="judul">
                        </div>
                        <div class="mb-3">
                            <label for="pengarang[]" class="form-label">Pengarang</label>
                            <input type="text" name="pengarang[]" class="form-control" id="pengarang">
                        </div>
                        <div class="mb-3">
                            <label for="tahun[]" class="form-label">Tahun</label>
                            <input type="text" name="tahun[]" class="form-control" id="tahun">
                        </div>
                        <label for="file[]" class="form-label">Cover</label>
                        <div class="custom-file">
                            <input type="file" name="file[]" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="/buku" class="btn-back">Back</a>
        <button type="submit" class="btn-add mt-2">Tambah buku</button>
    </form>
</div>
</div>

<script>
    function addForm() {
        const formContainer = document.getElementById('form-container');
        const formCard = document.createElement('div');
        formCard.className = 'col-md-4 mb-3';
        formCard.innerHTML = `
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="judul[]" class="form-label">Judul</label>
                        <input type="text" name="judul[]" class="form-control" id="judul">
                    </div>
                    <div class="mb-3">
                        <label for="pengarang[]" class="form-label">Pengarang</label>
                        <input type="text" name="pengarang[]" class="form-control" id="pengarang">
                    </div>
                    <div class="mb-3">
                        <label for="tahun[]" class="form-label">Tahun</label>
                        <input type="text" name="tahun[]" class="form-control" id="tahun">
                    </div>
                    <div class="custom-file">
                        <input type="file" name="file[]" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
        `;
        formContainer.appendChild(formCard);
    }
</script>

<?= $this->endSection(); ?>