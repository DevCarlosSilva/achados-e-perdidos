<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header('Location: signInSignUpLogOut/formSignIn.php');
}
require 'template/header.php';
?>

<body>
  <a href="signInSignUpLogOut/logOut.php">logout</a>

  <link rel="stylesheet" href="css/style.css">
  <?php
  require 'template/footer.php';
  ?>