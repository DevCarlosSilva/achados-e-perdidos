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
  <!-- font IBM Plex Mono -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column">
  <!-- nav/side bar -->
  <div>
    <nav class="custom-navbar logo-gray-bg container-fluid d-flex justify-content-between align-items-center px-4 py-2">
      <div class="navbar-brand">
        <ion-icon name="menu-sharp" class="btn sidebar-toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></ion-icon>
      </div>
      <a href="index.php" class="logo-navbar">
        <img src="assets/navbarLogo.png" alt="logo" draggable="false" class="img-fluid unselectable" />
      </a>
      <div class="dropdown-center">
        <button class="btn account-settings-button d-flex fw-semibold" data-bs-toggle="dropdown" aria-expanded="false">
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
        <span><?php echo $_SESSION['username']; ?></span><span class="mx-1">|</span><?php echo ($_SESSION['role'] == 0) ? '<span class="d-flex">usuário <ion-icon name="person-circle-sharp" class="account-settings-icon"></ion-icon></span>' : '<span class="text-warning d-flex">admin <ion-icon name="build-sharp" class="account-settings-icon"></ion-icon></span>'; ?>
      </div>
    </div>
  </div>
  <main class="container my-3 my-sm-4">
    <h1 class="text-warning d-flex align-items-end IBMPlexMonoFont m-0 justify-content-center justify-content-sm-start"><ion-icon name="home" class="me-2 mb-1 page-identificator-icon"></ion-icon>PÁGINA INICIAL</h1>
    <div class="page-title-divider w-100 my-1"></div>
    <span class="text-secondary mb-4 d-block text-center text-sm-start">Seu ponto de partida.</span>
    <div class="container">
      <div class="row gap-3">
        <a href="cruds/foundItems.php" class="card page-card  col-md logo-gray-bg">
          <div class="card-body h-50">
            <h5 class="card-title d-flex align-items-center"><ion-icon name="file-tray-full" class="me-2 sidebar-page-icon"></ion-icon>Itens encontrados</h5>
          </div>
          <div class="card-footer h-50 card-footer-background text-secondary d-flex justify-content-between align-items-center text-secondary">
            <div>Clique aqui para ver os itens encontrados</div>
            <ion-icon name="arrow-redo" class="ms-1"></ion-icon>
          </div>
        </a>
        <a href="cruds/returnedItems.php" class="card page-card logo-gray-bg  col-md">
          <div class="card-body h-50">
            <h5 class="card-title d-flex align-items-center"><ion-icon name="file-tray" class="me-2 sidebar-page-icon"></ion-icon>Itens devolvidos</h5>
          </div>
          <div class="card-footer h-50 card-footer-background text-secondary d-flex justify-content-between align-items-center">
            <div>Clique aqui para ver os itens devolvidos</div>
            <ion-icon name="arrow-redo" class="ms-1"></ion-icon>
          </div>
        </a>
        <a href="cruds/report.php" class="card page-card logo-gray-bg  col-md">
          <div class="card-body h-50">
            <h5 class="card-title d-flex align-items-center"><ion-icon name="trending-up-sharp" class="me-2 sidebar-page-icon"></ion-icon>Itens mais perdidos</h5>
          </div>
          <div class="card-footer h-50 card-footer-background text-secondary d-flex justify-content-between align-items-center">
            <div>Clique aqui para ver os itens mais perdidos</div>
            <ion-icon name="arrow-redo" class="ms-1"></ion-icon>
          </div>
        </a>
        <div class=" card logo-gray-bg my-3">
          <div class="card-header d-flex justify-content-between align-items-center p-3 logo-gray-bg">
            <h5 class="card-title d-flex align-items-center mb-0"><ion-icon name="pricetags" class="me-2 sidebar-page-icon"></ion-icon>Categorias de itens mais perdidos</h5>
            <a href="cruds/report.php" class="d-flex align-items-center p-1 card-table-arrow-icon"><ion-icon name="arrow-redo"></ion-icon></a>
          </div>
          <div class="card-body">
            <?php
            require 'database/dbConfig.php';
            $sql = 'SELECT count(c.id) AS countIDcat, c.name AS category
                    FROM found_items AS fi
                    JOIN categories AS c ON fi.category_id = c.id
                    GROUP BY c.id ORDER BY countIDcat DESC;';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $report = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($report) > 0) {
            ?>
              <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr class="text-center align-middle">
                      <th class="w-50">Categoria</th>
                      <th class="w-50">Número de ocorrências</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    <?php
                    foreach ($report as $category) {
                      echo '<tr>';
                      echo '<td class="text-center text-md-end">' . $category['category'] . '</td>';
                      echo '<td class="text-center text-md-start">' . $category['countIDcat'] . '</td>';
                      echo '</tr>';
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            <?php
            } else {
              echo '<h4 class=" p-3 d-flex align-items-center justify-content-center">Não há itens cadastrados no momento.<ion-icon name="sad-outline" class="no-items-icon ms-2"></ion-icon></h4>';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- footer -->
  <footer class="container-fluid p-3 logo-gray-bg text-center">
    <div class="text-secondary copyright m-0">Direitos Autorais © 2024 Carlos Silva. Todos os Direitos Reservados</div>
  </footer>
  <!-- ionicons -->
  <script defer type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script defer nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <!-- bootstrap -->
  <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="cruds/css/style.css">
</body>

</html>