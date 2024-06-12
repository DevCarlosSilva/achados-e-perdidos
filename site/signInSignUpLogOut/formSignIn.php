<?php
require 'template/formsHeader.php';
if (isset($_GET['alert'])) {
  switch ($_GET['alert']) {
    case "signUpSuccess":
      echo '<div class="alert alert-success d-flex align-items-center fw-semibold" role="alert">
              <ion-icon name="checkmark-circle-outline" class="me-1 alert-icons"></ion-icon>
              <div>Registro bem sucedido! Entre na sua conta<a href="formSignIn.php" class="text-success ms-1">[X]</a></div>
            </div>';
      break;
    case "signInErrorAccountNotFound":
      echo '<div class="alert alert-danger d-flex align-items-center fw-semibold" role="alert">
              <ion-icon name="alert-circle-outline" class="me-1 alert-icons"></ion-icon>
              <div>E-mail ou senha incorretos. Verifique suas informações e tente novamente<a href="formSignIn.php" class="text-danger ms-1">[X]</a></div>
            </div>';
      break;
    case "signInErrorInvalidCredentials":
      echo '<div class="alert alert-danger d-flex align-items-center fw-semibold" role="alert">
              <ion-icon name="alert-circle-outline" class="me-1 alert-icons"></ion-icon>
              <div>Por favor, insira um e-mail e senha válidos<a href="formSignIn.php" class="text-danger ms-1">[X]</a></div>
            </div>';
      break;
    case "logOut":
      echo '<div class="alert alert-success d-flex align-items-center fw-semibold" role="alert">
              <ion-icon name="checkmark-circle-outline" class="me-1 alert-icons"></ion-icon>
              <div>Você saiu da sua conta<a href="formSignIn.php" class="text-success ms-1">[X]</a></div>
            </div>';
      break;
  }
}
?>
<div class="w-100 m-auto form-container">
  <form action="signInValidation.php" method="post" class="needs-validation" novalidate>
    <img src="../assets/trimmedLogo.png" alt="logo" class="w-100 m-auto form-logo d-block mb-2">
    <span class="h3 fw-semi-bold">Entrar,</span>
    <span class="h5 fw-semi-bold text-warning"> olá denovo!</span>
    <div class="form-floating mt-2">
      <input type="email" name="email" id="email" class="form-control mb-1" placeholder="Insira seu e-mail" required>
      <label for="email">Insira seu e-mail</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" id="password" class="form-control" placeholder="Insira sua senha" required>
      <label for="password">Insira sua senha</label>
    </div>
    <input type="submit" value="Entrar" class="my-3 btn btn-warning w-100">
    <div class="text-center">
      <span>Ainda não tem uma conta? • </span><a href="formSignUp.php" class="text-warning">Registre-se</a>
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