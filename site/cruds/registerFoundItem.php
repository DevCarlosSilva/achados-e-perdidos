<!-- register found items -->
<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header('Location: ../signInSignUpLogOut/formSignIn.php');
} else {
  if ($_SESSION['role'] == 0) {
    header('Location: ../index.php');
  }
}
require 'template/header.php';
?>
<main class="container">
  <div class="d-flex justify-content-between align-items-end container">
    <h1 class="text-warning d-flex align-items-center IBMPlexMonoFont"><ion-icon name="add-circle-outline" class="me-2 page-identificator-icon"></ion-icon>REGISTRAR ITENS PERDIDOS</h1>
    <a href="foundItems.php" class="d-flex align-items-center return-to-home fw-semibold mb-1">Voltar<ion-icon name="arrow-undo" class="ms-1"></ion-icon></a>
  </div>
  <div class="page-title-divider w-100 mb-2"></div>
  <div class="container">
    <span class="text-secondary mb-4 d-block">Nesta página, você pode fazer o registro de intens perdidos.</span>
    <div class="container">
      <div class="w-100 m-auto form-container">
        <form action="signUpValidation.php" method="post" class="needs-validation" novalidate>
          <img src="../assets/trimmedLogo.png" alt="logo" class="w-100 m-auto form-logo d-block mb-2">
          <span class="h3 fw-semi-bold">Registre-se,</span>
          <span class="h5 fw-semi-bold text-warning"> bem-vindo(a)!</span>
          <div class="form-floating mt-2">
            <input name="username" id="username" class="form-control mb-1" placeholder="Insira seu nome de usuário" required>
            <label for="username">Insira um nome de usuário</label>
          </div>
          <div class="form-floating">
            <input type="email" name="email" id="email" class="form-control mb-1" placeholder="Insira seu e-mail" required>
            <label for="email">Insira seu e-mail</label>
          </div>
          <div class="form-floating">
            <input type="password" name="password" id="password" class="form-control" placeholder="Insira sua senha" required>
            <label for="password">Insira uma senha</label>
          </div>
          <input type="submit" value="Registre-se" class="my-3 btn btn-warning w-100">
          <div class="text-center">
            <span>Já tem uma conta? • </span><a href="formSignIn.php" class="text-warning">Entre</a>
          </div>
          <hr>
          <p class="text-secondary copyright text-center">Direitos Autorais © 2024 Carlos Silva. Todos os Direitos Reservados</p>
        </form>
      </div>
    </div>
  </div>
</main>
<?php
require 'template/footer.php';
?>