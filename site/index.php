<!-- home-page -->
<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header('Location: signInSignUpLogOut/formSignIn.php');
}
?>
<!-- header -->
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Achados & Perdidos</title>
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
      <a href="index.php" class="logo-navbar">
        <img src="assets/navbarLogo.png" alt="logo" draggable="false" class="img-fluid" />
      </a>
      <div class="dropstart">
        <button class="btn account-settings-button d-flex align-items-center fw-semibold" data-bs-toggle="dropdown" aria-expanded="false">
          <ion-icon name="chevron-back-sharp" class="account-settings-arrow-icon"></ion-icon>
          <span><?php echo $_SESSION['username']; ?></span><ion-icon name="person-circle-outline" class="ms-1 account-settings-icon"></ion-icon>
        </button>
        <ul class="dropdown-menu">
          <li>
            <a class="btn d-flex align-items-center dropdown-item log-out-button" href="signInSignUpLogOut/logOut.php">
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
        <a class="list-group-item rounded d-flex align-items-center logo-gray-bg" href="index.php"><ion-icon name="home-sharp" class="me-2 sidebar-page-icon"></ion-icon>Página inicial</a>
        <a class="list-group-item rounded d-flex align-items-center logo-gray-bg" href="cruds/foundItems.php"><ion-icon name="file-tray-full-sharp" class="me-2 sidebar-page-icon"></ion-icon>Itens encontrados</a>
        <a class="list-group-item rounded d-flex align-items-center logo-gray-bg" href="cruds/returnedItems.php"><ion-icon name="file-tray-sharp" class="me-2 sidebar-page-icon"></ion-icon>Itens devolvidos</a>
        <a class="list-group-item rounded d-flex align-items-center logo-gray-bg" href="cruds/report.php"><ion-icon name="trending-up-sharp" class="me-2 sidebar-page-icon"></ion-icon>Itens mais perdidos</a>
      </ul>
    </div>
    <div class="offcanvas-footer h-100 d-flex align-items-center justify-content-end px-3 text-secondary">
      <span><?php echo $_SESSION['username']; ?></span><span class="mx-1">|</span><?php if ($_SESSION['role'] == 0) {
                                                                                    echo '<span class="d-flex">usuário <ion-icon name="person-circle-sharp" class="account-settings-icon"></ion-icon></span>';
                                                                                  } else {
                                                                                    echo '<span class="text-warning d-flex">admin <ion-icon name="construct-sharp" class="account-settings-icon"></ion-icon></span>';
                                                                                  }; ?>
    </div>
  </div>
  <main class="container">
    <div class="d-flex justify-content-between align-items-end container">
      <h1 class="text-warning d-flex align-items-center"><ion-icon name="home" class="me-2 page-identificator-icon"></ion-icon>Página inicial</h1>
    </div>
    <div class="page-title-divider w-100 mb-3"></div>
    <div class="container">
      <div class="row gap-3">
        <a href="cruds/foundItems.php" class="card page-card col-sm logo-gray-bg">
          <div class="card-body">
            <h5 class="card-title d-flex align-items-center"><ion-icon name="file-tray-full" class="me-2 sidebar-page-icon"></ion-icon>Itens encontrados</h5>
          </div>
          <div class="card-footer text-secondary d-flex justify-content-between align-items-center text-secondary">
            <div>Clique aqui para ver os itens encontrados</div>
            <ion-icon name="arrow-redo" class="ms-1"></ion-icon>
          </div>
        </a>
        <a href="cruds/returnedItems.php" class="card page-card logo-gray-bg col-sm">
          <div class="card-body">
            <h5 class="card-title d-flex align-items-center"><ion-icon name="file-tray" class="me-2 sidebar-page-icon"></ion-icon>Itens devolvidos</h5>
          </div>
          <div class="card-footer text-secondary d-flex justify-content-between align-items-center">
            <div>Clique aqui para ver os itens devolvidos</div>
            <ion-icon name="arrow-redo" class="ms-1"></ion-icon>
          </div>
        </a>
        <a href="cruds/report.php" class="card page-card logo-gray-bg col-sm">
          <div class="card-body">
            <h5 class="card-title d-flex align-items-center"><ion-icon name="trending-up-sharp" class="me-2 sidebar-page-icon"></ion-icon>Itens mais perdidos</h5>
          </div>
          <div class="card-footer text-secondary d-flex justify-content-between align-items-center">
            <div>Clique aqui para ver os itens mais perdidos</div>
            <ion-icon name="arrow-redo" class="ms-1"></ion-icon>
          </div>
        </a>
        <div class="col-12 card logo-gray-bg my-3">
          <div class="card-header d-flex justify-content-between align-items-center p-3">
            <h5 class="card-title d-flex align-items-center mb-0"><ion-icon name="pricetags" class="me-2 sidebar-page-icon"></ion-icon>Categorias de itens mais perdidos</h5>
            <a href="cruds/report.php" class="d-flex align-items-center p-1 card-table-arrow-icon"><ion-icon name="arrow-redo"></ion-icon></a>
          </div>
          <div class="card-body">
            <?php
            require 'database/dbConfig.php';
            $sql = 'SELECT * FROM report';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $report = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($report) > 0) {
            ?>
              <table class="table table-striped table-hover table-responsive table-bordered">
                <thead>
                  <tr>
                    <th class="text-end w-50">Número de ocorrências</th>
                    <th class="w-50">Categoria</th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  <?php
                  foreach ($report as $category) {
                    echo '<tr>';
                    echo '<td class="text-end">' . $category['countIDcat'] . '</td>';
                    echo '<td>' . $category['category'] . '</td>';
                    echo '</tr>';
                  }
                  ?>
                </tbody>
              </table>
            <?php
            } else {
              echo '<h2 class="p-3 text-center text-warning">Não há itens cadastrados no momento.</h2>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  <link rel="stylesheet" href="cruds/css/style.css">
  <?php
  require 'cruds/template/footer.php';
  ?>