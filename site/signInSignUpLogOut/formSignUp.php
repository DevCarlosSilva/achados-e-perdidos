<?php
require 'template/formsHeader.php';
if (isset($_GET['alert'])) {
  switch ($_GET['alert']) {
    case "signUpErrorInvalidCredentials":
      echo '<div class="alert alert-danger d-flex align-items-center fw-semibold" role="alert">
              <ion-icon name="warning" class="alert-icons"></ion-icon>
              <div class="mx-2">Por favor, insira um nome de usuário, e-mail e senha válidos</div>
              <a href="formSignUp.php" class="btn-close"></a>
            </div>';
      break;
    case "emailAlreadyInUse":
      echo '<div class="alert alert-danger d-flex align-items-center fw-semibold" role="alert">
              <ion-icon name="warning" class="alert-icons"></ion-icon>
              <div class="mx-2">E-mail já está sendo usado por outra conta</div>
              <a href="formSignUp.php" class="btn-close"></a>
            </div>';
      break;
  }
}
?>
<div class="w-100 m-auto form-container">
  <form action="signUpValidation.php" method="post" class="needs-validation" novalidate>
    <img src="../assets/trimmedLogo.png" alt="logo" class="w-100 m-auto form-logo d-block mb-2 unselectable" draggable="false">
    <span class="h3 fw-semi-bold">Registre-se,</span>
    <span class="h5 fw-semi-bold text-warning"> bem-vindo(a)!</span>
    <div class="form-floating mt-2">
      <input name="username" id="username" class="form-control mb-1 unselectable" placeholder="Insira seu nome de usuário" required>
      <label for="username">Insira um nome de usuário</label>
    </div>
    <div class="form-floating">
      <input type="email" name="email" id="email" class="form-control mb-1 unselectable" placeholder="Insira seu e-mail" required>
      <label for="email">Insira seu e-mail</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" id="password" class="form-control unselectable" placeholder="Insira sua senha" required>
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
<script defer>
  // Capturar todos os form com class need-validaion e pra cada form ele adiciona um controlador de evento ao botão de submit checando os inputs e deixando ou não o form ser enviado
  (() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>
<?php
require 'template/formsFooter.php';
?>