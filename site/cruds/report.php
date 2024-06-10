<!-- report -->
<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header('Location: ../signInSignUpLogOut/formSignIn.php');
}
require 'template/header.php';
?>
<main class="container">
  <div class="d-flex justify-content-between align-items-end container">
    <h1 class="text-warning d-flex align-items-center"><ion-icon name="trending-up-sharp" class="me-2 page-identificator-icon"></ion-icon>Itens mais perdidos</h1>
    <a href="../index.php" class="d-flex align-items-center return-to-home fw-semibold mb-1">Voltar para a página inicial <ion-icon name="arrow-redo" class="ms-1"></ion-icon></a>
  </div>
  <div class="page-title-divider w-100 mb-3"></div>
  <div class="container">

  </div>
</main>
<?php
require 'template/footer.php';
?>