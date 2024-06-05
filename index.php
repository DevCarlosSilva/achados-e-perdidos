<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('Location: signInSignUpLogOut/formSignIn.php');
}
require 'header.php';
?>

<body>
  <?php
  require 'footer.php';
  ?>