<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header('Location: signInSignUpLogOut/formSignIn.php');
}
require 'template/header.php';
?>

<body>
  <nav class="navbar logo-bg-color px-4">
    <div class="container-fluid d-flex justify-content-between align-items-center p-0">
      <div class="navbar-brand">
        <ion-icon name="menu-outline" class="btn sidebar-toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></ion-icon>
        <a class="logo-navbar">
          <img src="assets/noTitleLogo.png" width="35" height="35" alt="imagem da logo" class="me-2" draggable="false" />
          <img src="assets/onlyTitleLogo.png" width="140" height="24" alt="nome da logo" draggable="false" />
        </a>
      </div>
      <div class="page-identificator d-flex align-items-center">
        <ion-icon name="home-outline" class="me-2 page-identificator-icon"></ion-icon>
        <div class="h4 m-0">Página inicial</div>
      </div>
    </div>
  </nav>

  <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header d-flex align-items-center">
      <img src="assets/noTitleLogo.png" width="35" height="35" alt="imagem da logo" class="me-2" draggable="false" />
      <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      //! REQUIRE ISSUE
      <ul class="list-group list-group-flush">
        <a class="list-group-item rounded" href="index.html">Página inicial</a>
        <a class="list-group-item rounded" href="index.html">Itens perdidos</a>
        <a class="list-group-item rounded" href="index.html">Itens devolvidos</a>
      </ul>
    </div>
    <div class="offcanvas-footer h-100 d-flex align-items-center justify-content-end px-3">
      <div class="btn-group dropup">
        <button type="button" class="btn dropdown-toggle d-flex align-items-center account-settings-button" data-bs-toggle="dropdown" aria-expanded="false">
          <ion-icon name="person-circle-outline" class="me-1 account-settings-icon"></ion-icon><?php echo $_SESSION['username']; ?>
        </button>
        <ul class="dropdown-menu">
          <li>
            //! REQUIRE ISSUE
            <a class="btn d-flex align-items-center dropdown-item log-out-button" href="index.html">
              <ion-icon name="log-out-outline" class="me-1 log-out-icon"></ion-icon>Sair da conta
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <link rel="stylesheet" href="css/style.css">
  <?php
  require 'template/footer.php';
  ?>