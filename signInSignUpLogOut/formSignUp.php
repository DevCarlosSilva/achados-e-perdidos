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
  // Caso o usuário envie apenas espaço em um dos inputs, ele será enviado de volta ao formulário de cadastro com uma mensagem esclarecendo que as credenciais utilizadas são inválidas
  if(isset($_GET['signUpError'])){
    if($_GET['signUpError'] === 'yes'){
      echo '<div class="alert alert-danger" role="alert">Invalid credentials. <a href="formSignUp.php" class="text-danger">[X]</a></div>';
    }
  }
  ?>
  <div class="w-100 m-auto form-container">
  <form action="signUpValidation.php" method="post">
    <img src="../assets/trimmedLogo.png" alt="logo" class="w-100 m-auto form-logo d-block mb-2">
    <span class="h3 fw-semi-bold">Cadastro,</span>
    <span class="h5 fw-semi-bold text-warning"> bem-vindo(a)!</span>
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
      <span>Já tem uma conta? • </span><a href="formSignIn.php" class="text-warning">Login</a>
    </div>
    <hr>
    <p class="text-secondary copyright text-center">Direitos Autorais © 2024 Carlos Silva. Todos os Direitos Reservados</p>
  </form>
  </div>
<?php
require '../footer.php';
?>