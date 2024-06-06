<?php
if (isset($_POST['username']) && !empty(trim($_POST['username'])) && isset($_POST['email']) && !empty(trim($_POST['email'])) && isset($_POST['password']) && !empty(trim($_POST['password']))) {
  require '../database/dbConfig.php';
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = 'SELECT * FROM accounts WHERE email = :email';
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    header('Location: formSignUp.php?emailAlreadyInUse=y');
  } else {
    $sql = 'INSERT INTO accounts(username,email,password) VALUES(:username,:email,:password)';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    header('Location: formSignIn.php?signUpSuccess=y');
  }
} else {
  header('Location: formSignUp.php?signUpErrorInvalidCredentials=y');
}
