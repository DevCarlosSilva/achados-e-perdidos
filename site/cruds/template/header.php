<!-- header -->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Achados & Perdidos</title>
  <!-- font IBM Plex Mono -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <!-- nav/side bar -->
  <nav class="custom-navbar logo-gray-bg container-fluid logo-bg-color px-4 mb-4 h-100 d-flex align-items-center">
    <div class="container-fluid d-flex justify-content-between align-items-center p-0 ">
      <div class="navbar-brand">
        <ion-icon name="menu-sharp" class="btn sidebar-toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></ion-icon>
      </div>
      <a href="../index.php" class="logo-navbar">
        <img src="../assets/navbarLogo.png" alt="logo" draggable="false" class="img-fluid" />
      </a>
      <div class="dropstart">
        <button class="btn account-settings-button d-flex align-items-center fw-semibold" data-bs-toggle="dropdown" aria-expanded="false">
          <ion-icon name="chevron-back-sharp" class="account-settings-arrow-icon"></ion-icon>
          <span><?php echo $_SESSION['username']; ?></span><ion-icon name="person-circle-outline" class="ms-1 account-settings-icon"></ion-icon>
        </button>
        <ul class="dropdown-menu">
          <li>
            <a class="btn d-flex align-items-center dropdown-item log-out-button" href="../signInSignUpLogOut/logOut.php">
              <ion-icon name="log-out-outline" class="me-1 log-out-icon"></ion-icon>Sair da conta
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="offcanvas offcanvas-start logo-gray-bg" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header d-flex align-items-center justify-content-between">
      <h4 class="offcanvas-title" id="offcanvasScrollingLabel">Menu</h4>
      <ion-icon name="menu-sharp" class="btn sidebar-toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></ion-icon>
    </div>
    <div class="offcanvas-body">
      <ul class="list-group list-group-flush">
        <a class="list-group-item rounded d-flex align-items-center logo-gray-bg" href="../index.php"><ion-icon name="home-sharp" class="me-2 sidebar-page-icon"></ion-icon>Página inicial</a>
        <a class="list-group-item rounded d-flex align-items-center logo-gray-bg" href="foundItems.php"><ion-icon name="file-tray-full-sharp" class="me-2 sidebar-page-icon"></ion-icon>Itens encontrados</a>
        <a class="list-group-item rounded d-flex align-items-center logo-gray-bg" href="returnedItems.php"><ion-icon name="file-tray-sharp" class="me-2 sidebar-page-icon"></ion-icon>Itens devolvidos</a>
        <a class="list-group-item rounded d-flex align-items-center logo-gray-bg" href="report.php"><ion-icon name="trending-up-sharp" class="me-2 sidebar-page-icon"></ion-icon>Itens mais perdidos</a>
      </ul>
    </div>
    <div class="offcanvas-footer h-100 d-flex align-items-center justify-content-end px-3 text-secondary">
      <span><?php echo $_SESSION['username']; ?></span><span class="mx-1">|</span><?php echo ($_SESSION['role'] == 0) ? '<span class="d-flex">usuário <ion-icon name="person-circle-sharp" class="account-settings-icon"></ion-icon></span>' : '<span class="text-warning d-flex">admin <ion-icon name="construct-sharp" class="account-settings-icon"></ion-icon></span>'; ?>
    </div>
  </div>