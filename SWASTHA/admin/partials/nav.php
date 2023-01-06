<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom border-dark border-4">
  <div class="container-fluid">
  <img src="../img/LOGO.jpeg"alt="LOGO">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li   class="nav-item active">
        <span id="A"> Welcome <?php echo ($_SESSION['username']) ?></span>
      </li>
      <div id="log">
      <li class="text-right" >
        <a id="B" class="nav-link" href="./logout.php">Logout</a>
      </li>
      </div>
      </li>
      </ul>
    </div>
  </div>
</nav>