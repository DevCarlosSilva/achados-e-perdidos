<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header('Location: signInSignUpLogOut/formSignIn.php');
}
require 'template/header.php';
?>

<body>
  <!-- sidebar e dropup + navbar com nome da página e logo -->
  <nav class="navbar logo-bg-color">
    <div class="container-fluid d-flex justify-content-start">
      <button class="navbar-toggler me-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <ion-icon name="menu"></ion-icon>
      </button>
      <div class="navbar-brand">
        <img src="assets/noTitleLogo.png" width="35" height="35" alt="imagem da logo" class="mx-2" draggable="false" />
        <img src="assets/onlyTitleLogo.png" width="140" height="24" alt="nome da logo" draggable="false" />
      </div>
    </div>
  </nav>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title mx-auto" id="exampleModalLabel">
            <img src="assets/noTitleLogo.png" width="35" height="35" alt="imagem da logo" class="me-2" draggable="false" />
            <img src="assets/onlyTitleLogo.png" width="140" height="24" alt="nome da logo" draggable="false" />
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item rounded">An item</li>
            <li class="list-group-item rounded">A second item</li>
            <li class="list-group-item rounded">A third item</li>
            <li class="list-group-item rounded">A fourth item</li>
            <li class="list-group-item rounded">And a fifth one</li>
          </ul>
        </div>
        <div class="modal-footer">
          <a class="btn d-flex align-items-center log-out-button">
            <ion-icon name="log-out-outline" class="me-1"></ion-icon>Sair da
            conta
          </a>
        </div>
      </div>
    </div>
  </div>
  <link rel="stylesheet" href="css/style.css">
  <?php
  require 'template/footer.php';
  ?>