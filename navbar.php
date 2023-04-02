<?php
require('header.php');
?>
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light p-3">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <span class="navbar-brand mb-0 fs-3 h1">TITLE</span>
    <!-- Collapsible wrapper -->
    <div class="d-flex align-items-center justify-content-end">


      <div class="d-flex align-items-center pe-4">
        <?php if ($_SESSION['user']['email'] ?? false) : ?>
          <p style="margin: 0 15px; "><?= $_SESSION['user']['name'] ?></p>
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user fa-lg"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="/" disabled><?= $_SESSION['user']['email'] ?></a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="/income">Add income</a>
              </li>
              <li>
                <a class="dropdown-item" href="/expense">Add expense</a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li>
                <a class="dropdown-item" href="/logout">Sign out</a>
              </li>
            </ul>
          </div>
        <?php else : ?>
          <a href="/login">
            <button type="button" class="btn btn-link px-3 me-2">
              Sign in
            </button>
          </a>
          <a href="/register">
            <button type="button" class="btn btn-primary me-3">
              Sign up
            </button>
          </a>
        <?php endif; ?>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
</nav>
<!-- Navbar -->