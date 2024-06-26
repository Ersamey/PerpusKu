<nav class="navbar navbar-expand-lg shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/">PerpusKu</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="nav nav-pills ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <?php if (!in_groups('perpustakaan')) : ?>
          <li class="nav-item">
            <a class="nav-link" href="/buku">Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pages/contact">Contact</a>
          </li>
        <?php endif;
        if (!logged_in()) : ?>
          <li class="nav-item">
            <a class="nav-link" href="/login">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/register">Sign Up</a>
          </li>
          <?php else :
          $user = user_id();
          if (in_groups('admin')) : ?>
            <li class="nav-item">
              <a class="nav-link" href="/admin">Users</a>
            </li>
          <?php elseif (in_groups('perpustakaan')) : ?>
            <a class="nav-link" href="/perpustakaan/buku">Manajemen Buku</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/user/<?= $user; ?>">myProfile</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="/logout ?>">Logout</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="/user/<?= $user; ?>">myProfile</a>
          </li> -->
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<script>
  // Dapatkan alamat URL saat ini
  const currentPath = window.location.pathname;

  // Dapatkan semua tautan navigasi
  const navLinks = document.querySelectorAll('.nav-link');

  // Loop melalui setiap tautan navigasi
  navLinks.forEach(link => {
    // Periksa apakah atribut href dari tautan cocok dengan alamat URL saat ini
    if (link.getAttribute('href') === currentPath) {
      // Tambahkan kelas active jika cocok
      link.classList.add('active');
    }
  });
</script>