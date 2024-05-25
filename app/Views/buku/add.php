<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-12 mb-3">
            <h1>Add Buku</h1>
            <button onclick="addForm()" class="btn btn-warning">+</button>
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
            <div class="col-md-4 mb-3">
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
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit All</button>
    </form>
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