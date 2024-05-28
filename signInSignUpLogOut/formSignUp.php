<?php
require '../header.php';
?>
  <?php
  // Caso o usuário envie apenas espaço em um dos inputs, ele será enviado de volta ao formulário de cadastro com uma mensagem esclarecendo que as credenciais utilizadas são inválidas
  if(isset($_GET['signUpError'])){
    if($_GET['signUpError'] === 'yes'){
      echo 'Invalid credentials.';
    }
  }
  ?>
  <h2 class="mb-3">Cadastro</h2>
  <form action="signUpValidation.php" method="post">
    <div class="mb-3">
      <label for="username">Username:</label>
      <input name="username" id="username">
    </div>
    <div class="mb-3">
      <label for="email">Email address:</label>
      <input type="email" name="email" id="email">
    </div>
    <div class="mb-3">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
    </div>
    <input type="submit" name="submit" value="Submit" class="mb-3">
  </form>
  <a href="formSignIn.php">Já tem uma conta?</a>
<?php
require '../footer.php';
?>