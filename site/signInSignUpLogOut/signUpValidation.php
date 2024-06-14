<?php
if (isset($_POST['email'], $_POST['password'], $_POST['username']) && !empty(trim($_POST['email'], $_POST['password'])) && !empty(trim($_POST['username']))) {
  // Too many arguments to function trim()
  require '../database/dbConfig.php';
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = 'SELECT * FROM accounts WHERE email = :email';
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    header('Location: formSignUp.php?alert=emailAlreadyInUse');
  } else {
    $sql = 'INSERT INTO accounts(username,email,password) VALUES(:username,:email,:password)';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    header('Location: formSignIn.php?alert=signUpSuccess');
  }
} else {
  header('Location: formSignUp.php?alert=signUpErrorInvalidCredentials');
}
