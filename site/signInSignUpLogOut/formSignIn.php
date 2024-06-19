<?php
require 'template/formsHeader.php';
if (isset($_GET['alert'])) {
  switch ($_GET['alert']) {
    case "signUpSuccess":
      echo '<div class="alert alert-success d-flex align-items-center fw-semibold" role="alert">
              <ion-icon name="checkmark-circle-outline" class="alert-icons"></ion-icon>
              <div class="mx-2">Registro bem sucedido! Entre na sua conta</div>
              <a href="formSignIn.php" class="btn-close"></a>
            </div>';
      break;
    case "signInErrorAccountNotFound":
      echo '<div class="alert alert-danger d-flex align-items-center fw-semibold" role="alert">
              <ion-icon name="warning" class="alert-icons"></ion-icon>
              <div class="mx-2">E-mail ou senha incorretos. Verifique suas informações e tente novamente</div>
              <a href="formSignIn.php" class="btn-close"></a>
            </div>';
      break;
    case "signInErrorInvalidCredentials":
      echo '<div class="alert alert-danger d-flex align-items-center fw-semibold" role="alert">
              <ion-icon name="warning" class="alert-icons"></ion-icon>
              <div class="mx-2">Por favor, insira um e-mail e senha válidos</div>
              <a href="formSignIn.php" class="btn-close"></a>
            </div>';
      break;
    case "logOut":
      echo '<div class="alert alert-success d-flex align-items-center fw-semibold" role="alert">
              <ion-icon name="checkmark-circle-outline" class="alert-icons"></ion-icon>
              <div class="mx-2">Você saiu da sua conta</div>
              <a href="formSignIn.php" class="btn-close"></a>
            </div>';
      break;
  }
}
?>
<div class="w-100 m-auto form-container p-2 p-sm-4">
  <form action="signInValidation.php" method="post" class="needs-validation" novalidate>
    <img src="../assets/trimmedLogo.png" alt="logo" class="w-100 m-auto form-logo d-block mb-2 unselectable img-fluid" draggable="false">
    <span class="h3 fw-semi-bold">Entrar,</span>
    <span class="h5 fw-semi-bold text-warning"> olá denovo!</span>
    <div class="form-floating mt-2">
      <input type="email" name="email" id="email" class="form-control mb-1 unselectable" placeholder="Insira seu e-mail" required>
      <label for="email">Insira seu e-mail</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" id="password" class="form-control unselectable" placeholder="Insira sua senha" required>
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