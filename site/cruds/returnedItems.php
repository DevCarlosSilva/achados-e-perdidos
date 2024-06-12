<!-- returned items -->
<?php
session_start();
if (!isset($_SESSION['loggedIn'])) {
  header('Location: ../signInSignUpLogOut/formSignIn.php');
}
require 'template/header.php';
?>
<main class="container">
  <div class="d-flex justify-content-between align-items-end container">
    <h1 class="text-warning d-flex align-items-center"><ion-icon name="file-tray" class="me-2 page-identificator-icon"></ion-icon>Itens devolvidos</h1>
    <a href="../index.php" class="d-flex align-items-center return-to-home fw-semibold mb-1">Voltar<ion-icon name="arrow-undo" class="ms-1"></ion-icon></a>
  </div>
  <div class="page-title-divider w-100 mb-3"></div>
  <div class="container">
    <span class="text-secondary">Nesta página, você encontrará uma lista de todos os itens que foram devolvidos aos seus devidos proprietários(as).</span>
    <?php
    require '../database/dbConfig.php';
    $sql = 'SELECT * FROM returned_items_view';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $returned_items_view = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($returned_items_view) > 0) {
    ?>
      <table class="table table-striped table-hover table-responsive table-bordered my-3">
        <thead>
          <tr>
            <th class="text-center">Nome</th>
            <th class="text-center">Descrição</th>
            <th class="text-center">Data achado</th>
            <th class="text-center">Local achado</th>
            <th class="text-center">Categoria</th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
          <?php
          foreach ($returned_items_view as $item) {
            echo '<tr>';
            echo '<td>' . $item['name'] . '</td>';
            echo '<td>' . $item['description'] . '</td>';
            echo '<td>' . $item['receiver_name'] . '</td>';
            echo '<td>' . $item['date_of_return'] . '</td>';
            echo '<td>' . $item['category'] . '</td>';
            echo '</tr>';
          }
          ?>
        </tbody>
      </table>
    <?php
    } else {
      echo '<div class="alert my-3 text-center align-self-center logo-gray-bg no-items-alert" role="alert"><h4 class="m-0">Não há itens devolvidos cadastrados no momento.</h4></div>';
    }
    ?>
  </div>
</main>
<?php
require 'template/footer.php';
?>