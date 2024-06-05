<?php
if (isset($_POST['email']) && !empty(trim($_POST['email'])) && isset($_POST['password']) && !empty(trim($_POST['password']))) {
  session_start();
  require '../database/dbConfig.php';
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    $data = $stmt->fetch();
    $_SESSION['loggedIn'] = 1;
    $_SESSION['username'] = $data['username'];
    header('Location: ../index.php');
  } else {
    header('Location: formSignIn.php?signInErrorAccountNotFound=y');
  }
} else {
  header('Location: formSignIn.php?signInErrorInvalidCredentials=y');
}
