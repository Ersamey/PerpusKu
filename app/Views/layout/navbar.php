<nav class="navbar navbar-expand-lg shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">PerpusKu</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="nav nav-pills ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/buku">Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pages/contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sign In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sign Up</a>
        </li>
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