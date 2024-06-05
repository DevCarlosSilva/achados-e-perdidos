<?php
require '../header.php';
?>

<body class="d-flex align-items-center flex-column p-5 form-page-bg">
  <?php
  if (isset($_GET['signUpSuccess'])) {
    if ($_GET['signUpSuccess'] === 'y') {
      echo '<div class="alert alert-success d-flex align-items-center" role="alert">
              <svg class="me-2" width="20" fill="currentColor"  viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </svg>
              <div>Registro bem sucedido! Entre na sua conta <a href="formSignIn.php" class="text-success">[X]</a></div>
            </div>';
    }
  }
  if (isset($_GET['signInErrorAccountNotFound'])) {
    if ($_GET['signInErrorAccountNotFound'] === 'y') {
      echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
              <svg class="me-2" width="20" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
              <div>Usuário não encontrado <a href="formSignIn.php" class="text-danger">[X]</a></div>
            </div>';
    }
  }
  if (isset($_GET['signInErrorInvalidCredentials'])) {
    if ($_GET['signInErrorInvalidCredentials'] === 'y') {
      echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
              <svg class="me-2" width="20" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
              <div>Por favor, insira um e-mail e senha válidos <a href="formSignIn.php" class="text-danger">[X]</a></div>
            </div>';
    }
  }
  if (isset($_GET['logOut'])) {
    if ($_GET['logOut'] === 'y') {
      echo '<div class="alert alert-success d-flex align-items-center" role="alert">
              <svg class="me-2" width="20" fill="currentColor"  viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </svg>
              <div>Você saiu da sua conta <a href="formSignIn.php" class="text-success">[X]</a></div>
            </div>';
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
      <input type="submit" name="submit" value="Entrar" class="my-3 btn btn-warning w-100">
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
  require '../footer.php';
  ?>