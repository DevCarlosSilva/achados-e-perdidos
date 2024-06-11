<?php
if (isset($_POST['email']) && !empty(trim($_POST['email'])) && isset($_POST['password']) && !empty(trim($_POST['password']))) {
  require '../database/dbConfig.php';
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    $accountInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    session_start();
    $_SESSION['loggedIn'] = 1;
    $_SESSION['username'] = $accountInfo['username'];
    $_SESSION['role'] = $accountInfo['admin'];
    header('Location: ../index.php');
  } else {
    header('Location: formSignIn.php?alert=signInErrorAccountNotFound');
  }
} else {
  header('Location: formSignIn.php?alert=signInErrorInvalidCredentials');
}
