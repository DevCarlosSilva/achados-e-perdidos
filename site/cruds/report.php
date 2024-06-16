<!-- report -->
<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header('Location: ../signInSignUpLogOut/formSignIn.php');
}
require 'template/header.php';
?>
<main class="container my-3 my-sm-4">
  <div class="d-flex justify-content-between align-items-end">
    <h1 class="text-warning d-flex align-items-center IBMPlexMonoFont m-0"><ion-icon name="file-tray-full" class="me-2 page-identificator-icon"></ion-icon>ITENS MAIS PERDIDOS</h1>
    <a href="../index.php" class="d-flex align-items-center return-to-home fw-semibold mb-1">Voltar<ion-icon name="arrow-undo" class="ms-1"></ion-icon></a>
  </div>
  <div class="page-title-divider w-100 my-1"></div>
  <span class="text-secondary mb-4 d-block text-center text-sm-start">Nesta página, você encontrará uma lista das categorias de itens mais perdidas.</span>
  <div class="container" id="most-often-lost-table-container">
    <?php
    require '../database/dbConfig.php';
    $sql = 'SELECT * FROM report';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $report = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($report) > 0) {
    ?>
      <div class="table-responsive w-100">
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
      echo '<div class="alert my-3 text-center align-self-center logo-gray-bg no-items-alert" role="alert"><h4 class="">Não há itens cadastrados no momento.<ion-icon name="sad-outline" class="no-items-icon ms-2"></ion-icon></h4></div>';
    }
    ?>
  </div>
</main>
<?php
require 'template/footer.php';
?>