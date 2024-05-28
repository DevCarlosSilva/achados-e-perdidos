<?php
if(isset($_POST['submit'])){
  if(isset($_POST['username']) && !empty(trim($_POST['username'])) && isset($_POST['email']) && !empty(trim($_POST['email'])) && isset($_POST['password']) && !empty(trim($_POST['password']))){
    require '../database/dbConfig.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = 'INSERT INTO accounts(username,email,password) VALUES(:username,:email,:password)';
    $result = $conn->prepare($sql);
    $result->bindValue(':username',$username);
    $result->bindValue(':email',$email);
    $result->bindValue(':password',$password);
    $result->execute();
    header('Location: formSignIn.php?signUpSuccess=yes');
  }else{
    header('Location: formSignUp.php?signUpError=yes');
  }
}else{
  header('Location: formSignUp.php');
}