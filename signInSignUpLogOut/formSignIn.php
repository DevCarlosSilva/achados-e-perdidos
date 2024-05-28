<?php
require '../header.php';
?>
  <?php
  // Se a inscrição for bem-sucedida, o usuário será direcionado para a página de login que conterá uma mensagem para garantir que a conta foi criada com sucesso
  if(isset($_GET['signUpSuccess'])){
    if($_GET['signUpSuccess'] === 'yes'){
      echo 'Successfully signed up!';
    }
  }
  // ISe o login falhar o usuário será direcionado para a página de login que terá uma mensagem esclarecendo que as credenciais utilizadas são inválidas
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
  <div class="w-100 m-auto"></div>
  <img src="../assets/logo.jpg" alt="logo" class="max-w-">
  <h2 class="mb-3">Login</h2>
  <form action="signInValidation.php" method="post">
    <div class="mb-3">
      <label for="username" class="form-label">Username:</label>
      <input name="username" id="username" class="form-control">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address:</label>
      <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password:</label>
      <input type="password" name="password" id="password" class="form-control">
    </div>
    <input type="submit" name="submit" value="Submit" class="mb-3 btn btn-warning">
  </form>
  <a href="formSignUp.php" class="">Ainda não se cadastrou?</a>
<?php
require '../footer.php';
?>