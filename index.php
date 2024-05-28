<!-- home page -->
<?php
session_start();
if(!isset($_SESSION['id'])){
  header('Location: signInSignUpLogOut/formSignIn.php');
}
?>
<?php
require 'header.php';
?>
<a href="signInSignUpLogOut/logOut.php">Log out</a>
<?php
require 'footer.php';
?>