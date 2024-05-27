<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="mt-2">Manajemen Buku</h1>
      <table class="tabelBuku">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Penulis</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php $i = 1; ?>
            <?php foreach ($list as $l) :  ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $l['judul'] ?></td>
                <td><?= $l['pengarang'] ?></td>
                <td><?= $l['status'] ?></td>
            <td>
              <a href="" class="btn btn-danger">Hapus</a>
              <a href="" class="btn btn-warning">Edit</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>