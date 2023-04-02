<?php
require('header.php');
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Navbar brand -->
    <a class="navbar-brand fs-1 ms-5" href="/">
          Cash Note
    </a>
      <div class="d-flex align-items-center me-5">
      <?php if($_SESSION['user']['email'] ?? false): ?>
        <span class="navbar-text me-2">
          <?= $_SESSION['user']['email'] ?>
        </span>
        <span class="navbar-text me-2">
          <a href="/logout">Logout</a>
        </span>
        <?php else: ?>
        <span class="navbar-text me-2">
          <a href="/register">Register</a>
        </span>
        <span class="navbar-text me-2">
          |
        </span>
        <span class="navbar-text me-2">
          <a href="/login">Login</a>
        </span>
        <?php endif; ?>
        <a
          class="btn btn-dark px-3"
          href="https://github.com/mdbootstrap/mdb-ui-kit"
          role="button"
          ><i class="fab fa-github"></i
        ></a>
      </div>
    </div>
    <!-- Collapsible wrapper -->

  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->
