<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<?php if (!empty($perpustakaan)) : ?>
    <?php foreach ($perpustakaan as $p) : ?>
        <div>
            <p><?= $p['nama']; ?></p>
            <p><?= $p['alamat']; ?></p>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p>No data available</p>
<?php endif; ?>
<?= $this->endSection(); ?>