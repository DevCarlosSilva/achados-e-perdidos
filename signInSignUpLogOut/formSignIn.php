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
<body class="d-flex align-items-center flex-column p-4">
  <?php
  // Se a inscrição for bem-sucedida, o usuário será direcionado para a página de login que conterá uma mensagem para garantir que a conta foi criada com sucesso
  if(isset($_GET['signUpSuccess'])){
    if($_GET['signUpSuccess'] === 'yes'){
      echo '<div class="alert alert-success" role="alert">Successfully signed up! <a href="formSignIn.php" class="text-success">[X]</a></div>';
    }
  }
  // Se o login falhar o usuário será direcionado para a página de login que terá uma mensagem esclarecendo que as credenciais utilizadas são inválidas
  if(isset($_GET['signInError'])){
    if($_GET['signInError'] === 'yes'){
      echo '<div class="alert alert-danger" role="alert">Invalid credentials. <a href="formSignIn.php" class="text-danger">[X]</a></div>';
    }
  }
  // Se o log out foi execultado com sucesso uma mensagem vai aparecer esclarecendo
  if(isset($_GET['logOut'])){
    if($_GET['logOut'] === 'success'){
      echo '<div class="alert alert-success" role="alert">Successfully logged out! <a href="formSignIn.php" class="text-success">[X]</a></div>';
    }
  }
?>
  <div class="w-100 m-auto form-container">
  <form action="signInValidation.php" method="post" class="needs-validation" novalidate>
    <img src="../assets/trimmedLogo.png" alt="logo" class="w-100 m-auto form-logo d-block mb-2">
    <span class="h3 fw-semi-bold">Login,</span>
    <span class="h5 fw-semi-bold text-warning"> olá denovo!</span>
    <div class="form-floating mt-3">
      <input name="username" id="username" class="form-control mb-1" placeholder="Nome de usuário" required>
      <label for="username">Nome de usuário</label>
    </div>
    <div class="form-floating">
      <input type="email" name="email" id="email" class="form-control mb-1" placeholder="seu-email@gmail.com" required>
      <label for="email">E-mail</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
      <label for="password">Senha</label>
    </div>
    <input type="submit" name="submit" value="Submit" class="my-3 btn btn-warning w-100">
    <div class="text-center">
      <span>Ainda não tem uma conta? • </span><a href="formSignUp.php" class="text-warning">Cadastre-se</a>
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