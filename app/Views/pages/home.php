<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>

<section class="home bg-belakang ">
  <div class="container text-left">
    <div class="row justify-content-around">
      <div class="col-6">
        <?php if (logged_in()) :
          $username = user()->username;
        ?>
          <h1 class="gradient-text-welcome mt-5 pt-5">Hallo,</h1>
          <h1 class="gradient-text-nama"><?= $username; ?></h1>
        <?php endif; ?>
        <h1 class="gradient-text-welcome">Welcome to</h1>
        <h1 class="text-perpusku">Perpusku</h1>
        <?php if (in_groups('perpustakaan')) {
          $nama = user()->username;
        } ?>
        <p class="mt-4 mb-1" style="font-weight: bold;">PerpusKu adalah salah satu website yang terdiri dari sekumpulan</p>
        <p class="pb-4"style="font-weight: bold;">perpustakaan tempat menyediakan buku di wilayah kota Bandung </p>
        <?php if (!in_groups('perpustakaan')) : ?>
          <a class=" btn-jelajah" href="/buku" role="button">Jelajahi sekarang!</a>
        <?php endif; ?>
      </div>
      <div class="col-4 pt-5 mt-5 ml-3">
        <img src="<?= base_url() ?>/img/home.png" alt="home" width="372" height="390">
      </div>
      <p class="pt-3 mt-3 text-center" style="color: #5465d9; font-weight: bold;">"Cuma perlu satu buku untuk jatuh cinta pada membaca. Cari buku itu, mari jatuh cinta!" </p>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>