<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>

<section class="home">
  <?php if (in_groups('perpustakaan')) : ?>
    <div class="container text-left">
      <div class="row justify-content-around">
        <div class="col-6">
          <h1 class="display-4 gradient-text-welcome">Welcome</h1>
          <h1 class="display-4 text-perpusku">Perpustakaan</h1>
        </div>

        <div class="col-4 pt-2">
          <img src="<?= base_url() ?>/img/home.png" alt="home" width="450" height="400">
        </div>
      </div>
    </div>

  <?php endif; ?>

  <?php if (!in_groups('perpustakaan')) : ?>
    <div class="container text-left">
      <div class="row justify-content-around">
        <div class="col-6">
          <h1 class="display-4 gradient-text-welcome">Welcome to</h1>
          <h1 class="display-4 text-perpusku">Perpusku</h1>
          <p class="mt-4">PerpusKu adalah salah satu website yang terdiri dari sekumpulan </p>
          <p class="mt-">perpustakaan tempat menyediakan buku di wilayah kota Bandung </p>
          <a class="btn mt-4 btn-jelajah " href="/buku" role="button">Jelajahi sekarang!</a>
        </div>

        <div class="col-4 pt-2">
          <img src="<?= base_url() ?>/img/home.png" alt="home" width="450" height="400">
        </div>
      </div>
    </div>
  <?php endif; ?>

</section>
<?= $this->endSection(); ?>