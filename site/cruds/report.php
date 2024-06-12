<!-- report -->
<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header('Location: ../signInSignUpLogOut/formSignIn.php');
}
require 'template/header.php';
?>
<main class="container">
  <div class="d-flex justify-content-between align-items-end container">
    <h1 class="text-warning d-flex align-items-center IBMPlexMonoFont"><ion-icon name="trending-up-sharp" class="me-2 page-identificator-icon"></ion-icon>ITENS MAIS PERDIDOS</h1>
    <a href="../index.php" class="d-flex align-items-center return-to-home fw-semibold mb-1">Voltar<ion-icon name="arrow-undo" class="ms-1"></ion-icon></a>
  </div>
  <div class="page-title-divider w-100 mb-3"></div>
  <div class="container">
    <span class="text-secondary">Nesta página, você encontrará uma lista das categorias de itens mais perdidas.</span>
    <?php
    require '../database/dbConfig.php';
    $sql = 'SELECT * FROM report';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $report = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($report) > 0) {
    ?>
      <table class="table table-striped table-hover table-responsive table-bordered my-3">
        <thead>
          <tr>
            <th class="text-center w-50 align-middle">Categoria</th>
            <th class="text-center w-50 align-middle">Número de ocorrências</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php
          foreach ($report as $category) {
            echo '<tr>';
            echo '<td class="text-center">' . $category['category'] . '</td>';
            echo '<td class="text-center">' . $category['countIDcat'] . '</td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
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