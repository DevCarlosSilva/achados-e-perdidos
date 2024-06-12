<!-- found items -->
<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header('Location: ../signInSignUpLogOut/formSignIn.php');
}
require 'template/header.php';
?>
<main class="container">
  <div class="d-flex justify-content-between align-items-end container">
    <h1 class="text-warning d-flex align-items-center IBMPlexMonoFont"><ion-icon name="file-tray-full" class="me-2 page-identificator-icon"></ion-icon>ITENS ENCONTRADOS</h1>
    <a href="../index.php" class="d-flex align-items-center return-to-home fw-semibold mb-1">Voltar<ion-icon name="arrow-undo" class="ms-1"></ion-icon></a>
  </div>
  <div class="page-title-divider w-100 mb-2"></div>
  <div class="container">
    <span class="text-secondary mb-4 d-block">Nesta página, você encontrará uma lista de todos os itens que foram encontrados e registrados no sistema de achados e perdidos.</span>
    <?php
    require '../database/dbConfig.php';
    $sql = 'SELECT * FROM found_items_view';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $found_items_view = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($found_items_view) > 0) {
      if ($_SESSION['role'] == 1) {
        echo '<button class="fw-semibold add-item-button d-flex align-items-center"><ion-icon name="add-circle-outline" class="me-1 add-item-icon"></ion-icon>Cadastrar</button>';
      }
    ?>
      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <tr>
              <th class="text-center">Nome</th>
              <th class="text-center">Descrição</th>
              <th class="text-center">Data achado</th>
              <th class="text-center">Local achado</th>
              <th class="text-center">Categoria</th>
              <?php
              if ($_SESSION['role'] == 1) {
                echo '<th class="text-center">Ações</th>';
              }
              ?>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            foreach ($found_items_view as $item) {
              echo '<tr>';
              echo '<td class="align-middle">' . $item['name'] . '</td>';
              echo '<td class="align-middle">' . $item['description'] . '</td>';
              echo '<td class="align-middle">' . $item['date_of_find'] . '</td>';
              echo '<td class="align-middle">' . $item['place_of_find'] . '</td>';
              echo '<td class="align-middle">' . $item['category'] . '</td>';
              if ($_SESSION['role'] == 1) {
                echo '<td class="text-center align-middle">';
            ?>
                <div class="dropdown-center">
                  <ion-icon name="ellipsis-horizontal" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></ion-icon>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Action two</a></li>
                    <li><a class="dropdown-item" href="#">Action three</a></li>
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