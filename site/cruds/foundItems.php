<!-- found items -->
<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header('Location: ../signInSignUpLogOut/formSignIn.php');
}
require 'template/header.php';
?>
<main class="container my-3 my-sm-4">
  <div class="d-flex justify-content-between align-items-end">
    <h1 class="text-warning d-flex align-items-center IBMPlexMonoFont m-0"><ion-icon name="file-tray-full" class="me-2 page-identificator-icon"></ion-icon>ITENS ENCONTRADOS</h1>
    <a href="../index.php" class="d-flex align-items-center return-to-home fw-semibold mb-1">Voltar<ion-icon name="arrow-undo" class="ms-1"></ion-icon></a>
  </div>
  <div class="page-title-divider w-100 my-1"></div>
  <span class="text-secondary mb-4 d-block text-center text-sm-start">Nesta página, você encontrará uma lista de todos os itens que foram encontrados e registrados no sistema de achados e perdidos.</span>
  <div class="container">
    <?php
    require '../database/dbConfig.php';
    $sql = 'SELECT * FROM found_items_view';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $found_items_view = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($found_items_view) > 0) {
      if ($_SESSION['role'] == 1) {
        echo '<a href="registerFoundItem.php" class="fw-semibold add-item-button d-flex align-items-center"><ion-icon name="add-circle-outline" class="me-1 add-item-icon"></ion-icon>Registrar</a>';
      }
    ?>
      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <tr class="text-center align-middle">
              <th>Nome</th>
              <th>Descrição</th>
              <th>Data achado</th>
              <th>Local achado</th>
              <th>Categoria</th>
              <?php
              if ($_SESSION['role'] == 1) {
                echo '<th>Ações</th>';
              }
              ?>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            foreach ($found_items_view as $item) {
              echo '<tr class="text-center align-middle">';
              echo '<td>' . $item['name'] . '</td>';
              echo '<td class="text-start">' . $item['description'] . '</td>';
              echo '<td class="date-td-minwidth">' . $item['date_of_find'] . '</td>';
              echo '<td>' . $item['place_of_find'] . '</td>';
              echo '<td>' . $item['category'] . '</td>';
              if ($_SESSION['role'] == 1) {
                echo '<td>';
            ?>
                <div class="dropdown-center">
                  <ion-icon name="ellipsis-horizontal" class="dropdown-toggle text-center align-middle p-2" type="button" data-bs-toggle="dropdown" aria-expanded="false"></ion-icon>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="btn d-flex align-items-center dropdown-item log-out-button" href="signInSignUpLogOut/logOut.php">
                        <ion-icon name="log-out-outline" class="me-1 log-out-icon"></ion-icon>Editar
                      </a>
                    </li>
                    <li>
                      <a class="btn d-flex align-items-center dropdown-item log-out-button" href="signInSignUpLogOut/logOut.php">
                        <ion-icon name="log-out-outline" class="me-1 log-out-icon"></ion-icon>Mover
                      </a>
                    </li>
                    <li>
                      <a class="btn d-flex align-items-center dropdown-item log-out-button" href="signInSignUpLogOut/logOut.php">
                        <ion-icon name="log-out-outline" class="me-1 log-out-icon"></ion-icon>Excluir
                      </a>
                    </li>
                  </ul>
                </div>
            <?php
                echo '</td>';
              }
              echo '</tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    <?php
    } else {
      echo '<div class="alert my-3 text-center align-self-center logo-gray-bg no-items-alert" role="alert"><h4 class="">Não há itens encontrados cadastrados no momento.<ion-icon name="sad-outline" class="no-items-icon ms-2"></ion-icon></h4></div>';
    }
    ?>
  </div>
</main>
<?php
require 'template/footer.php';
?>