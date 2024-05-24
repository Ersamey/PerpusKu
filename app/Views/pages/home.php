<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>

<section class="home">
  <div class="container text-left">
    <div class="row justify-content-around">
      <div class="col-6">
        <?php if (logged_in()) :
          $username = user()->username;
        ?>
          <h1 class="display-4 gradient-text-welcome">Hallo, <?= $username; ?></h1>
        <?php endif; ?>
        <h1 class="display-4 gradient-text-welcome">Welcome to</h1>
        <h1 class="display-4 text-perpusku">Perpusku</h1>
        <p class="mt-4">PerpusKu adalah salah satu website yang terdiri dari sekumpulan </p>
        <p class="mt-">perpustakaan tempat menyediakan buku di wilayah kota Bandung </p>
        <a class="btn mt-4 btn-jelajah " href="/buku" role="button">Jelajahi sekarang!</a>
      </div>

      <div class="col-4 pt-2">
        <img src="img/home.png" alt="home" width="450" height="400">
      </div>
    </div>
  </div>

</section>
<?= $this->endSection(); ?>