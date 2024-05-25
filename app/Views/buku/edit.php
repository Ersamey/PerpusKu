<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Ini Edit</h1>
            <form action="/buku/update" method="post" enctype="multipart/form-data" id="main-form">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $buku['pict']; ?>">
                <div class="row mt-3" id="form-container">
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" name="judul" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" value="<?= old('judul', $buku['judul']); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('judul'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="pengarang" class="form-label">Pengarang</label>
                                    <input type="text" name="pengarang" class="form-control <?= ($validation->hasError('pengarang')) ? 'is-invalid' : ''; ?>" id="pengarang" value="<?= old('pengarang', $buku['pengarang']); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pengarang'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="text" name="tahun" class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" id="tahun" value="<?= old('tahun', $buku['tahun']); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tahun'); ?>
                                    </div>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input <?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('file'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>