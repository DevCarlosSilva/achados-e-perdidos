<!-- home page -->
<?php
session_start();
if(!isset($_SESSION['id'])){
  header('Location: signInSignUpLogOut/formSignIn.php');
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Itens Encontrados</title>
  <link rel="stylesheet" href="style.css">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-background px-5">
    <div class="container-fluid">
      <a class="navbar-brand d-flex gap-3 align-items-center" href="index.php">
        <img src="assets/noTitleLogo.png" alt="logo" width="35" height="35">
        <img src="assets/onlyTitleLogo.png" alt="título logo" width="140" height="24">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link text-black nav-item-hover" href="index.php">Home-Page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-black nav-item-hover" href="foundItems.php">Itens Encontrados</a>
          </li>
          <li class="nav-item me-lg-5">
            <a class="nav-link text-black nav-item-hover" href="returnedItems.php">Itens Devolvidos</a>
          </li>
          <li class="nav-item dropdown ms-lg-5">
            <a class="nav-link dropdown-toggle ms-lg-5 nav-item-hover text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="assets/blankProfile.png" alt="blank profile image" width="24"> <?php echo $_SESSION['username']; ?>
            </a>
      <ul class="dropdown-menu bg-danger">
        <li><a class="dropdown-item bg-danger text-white" href="signInSignUpLogOut/logOut.php">Log out</a></li>
      </ul>
    </li>
        </ul>
      </div>
    </div>
  </nav>
<?php
require 'footer.php';
?>