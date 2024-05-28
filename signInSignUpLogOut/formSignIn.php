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
<body class="d-flex align-items-center">
  <?php
  // Se a inscrição for bem-sucedida, o usuário será direcionado para a página de login que conterá uma mensagem para garantir que a conta foi criada com sucesso
  if(isset($_GET['signUpSuccess'])){
    if($_GET['signUpSuccess'] === 'yes'){
      echo 'Successfully signed up!';
    }
  }
  // Se o login falhar o usuário será direcionado para a página de login que terá uma mensagem esclarecendo que as credenciais utilizadas são inválidas
  if(isset($_GET['signInError'])){
    if($_GET['signInError'] === 'yes'){
      echo 'Invalid credentials.';
    }
  }
  // Se o log out foi execultado com sucesso uma mensagem vai aparecer esclarecendo
  if(isset($_GET['logOut'])){
    if($_GET['logOut'] === 'success'){
      echo 'Successfully logged out!';
    }
  }
?>
  <div class="w-100 m-auto form-container">
  <form action="signInValidation.php" method="post">
    <img src="../assets/trimmedLogo.png" alt="logo" class="w-100 m-auto form-logo d-block mb-2">
    <span class="h3 fw-semi-bold">Login,</span>
    <span class="h5 fw-semi-bold text-warning"> olá denovo!</span>
    <div class="form-floating mt-3">
      <input name="username" id="username" class="form-control mb-1" placeholder="Nome de usuário">
      <label for="username">Nome de usuário</label>
    </div>
    <div class="form-floating">
      <input type="email" name="email" id="email" class="form-control mb-1" placeholder="seu-email@gmail.com">
      <label for="email">E-mail</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" id="password" class="form-control" placeholder="Senha">
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
<?php
require '../footer.php';
?>