<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="bg-belakang ">
<div class="container">
    <div class="row  pt-1 mb-5">
        <div class="col edit">
        <h1 class="gradient-text mb-4">Silahkan Edit</h1>
            <form action="/buku/update" method="post" enctype="multipart/form-data" id="main-form">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">
                <input type="hidden" name="sampulLama" value="<?= $buku['pict']; ?>">
                <div class="row mt-3 justify-content-center" id="form-container">
                    <div class="col-md-6 mb-3">
                        <div class="card-kartu">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" name="judul" class="form-control-edit <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" value="<?= old('judul', $buku['judul']); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('judul'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="pengarang" class="form-label">Pengarang</label>
                                    <input type="text" name="pengarang" class="form-control-edit <?= ($validation->hasError('pengarang')) ? 'is-invalid' : ''; ?>" id="pengarang" value="<?= old('pengarang', $buku['pengarang']); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pengarang'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Tahun</label>
                                    <input type="text" name="tahun" class="form-control-edit <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" id="tahun" value="<?= old('tahun', $buku['tahun']); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tahun'); ?>
                                    </div>
                                </div>
                                <label for="file" class="form-label">Cover</label>
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input<?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" id="customFile">
                                    <label class="custom-file-label-edit" for="customFile">Choose file</label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('file'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/buku/<?= $buku['slug']; ?>" class="btn-edit-back">Back</a>
                <button type="submit" class="btn-edit mt-2">Submit</button>
                
            </form>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>