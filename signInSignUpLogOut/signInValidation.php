<?php
if(isset($_POST['submit'])){
  if(isset($_POST['username']) && !empty(trim($_POST['username'])) && isset($_POST['email']) && !empty(trim($_POST['email'])) && isset($_POST['password']) && !empty(trim($_POST['password']))){
    session_start();
    require '../database/dbConfig.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = 'SELECT * FROM accounts WHERE username = :username AND email = :email AND password = :password';
    $result = $conn->prepare($sql);
    $result->bindValue(':username',$username);
    $result->bindValue(':email',$email);
    $result->bindValue(':password',$password);
    $result->execute();
    if($result->rowCount() > 0){
      $data = $result->fetch();
      $_SESSION['id'] = $data['id'];
      $_SESSION['username'] = $data['username'];
      header('Location: ../index.php');
    }else{
      header('Location: formSignIn.php?signInError=yes');
    }
  }else{
    header('Location: formSignIn.php?signInError=yes');
  }
}else{
  header('Location: formSignIn.php');
}