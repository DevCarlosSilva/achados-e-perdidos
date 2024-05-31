<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Achados & Perdidos</title>
  <link rel="stylesheet" href="../style.css">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex align-items-center flex-column p-5 form-page-bg">
  <?php
  //* The isset() function prevents an error (checking a variable that hasn't been declared)
  //* The viewBox attribute defines the position and dimension, in user space, of an SVG viewport.
  // Caso o usuário envie apenas espaço em um dos inputs, ele será enviado de volta ao formulário de registro com uma mensagem esclarecendo que as credenciais utilizadas são inválidas
  if (isset($_GET['signUpErrorInvalidCredentials'])) {
    if ($_GET['signUpErrorInvalidCredentials'] === 'y') {
      echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
              <svg class="me-2" width="20" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
              <div>Por favor, insira um nome de usuário, e-mail e senha válidos <a href="formSignUp.php" class="text-danger">[X]</a></div>
            </div>';
    }
  }
  if (isset($_GET['emailAlreadyInUse'])) {
    if ($_GET['emailAlreadyInUse'] === 'y') {
      echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
              <svg class="me-2" width="20" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
              </svg>
              <div>E-mail já está sendo usado por outra conta <a href="formSignUp.php" class="text-danger">[X]</a></div>
            </div>';
    }
  }
  ?>
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
      <input type="submit" name="submit" value="Registre-se" class="my-3 btn btn-warning w-100">
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
  require '../footer.php';
  ?>