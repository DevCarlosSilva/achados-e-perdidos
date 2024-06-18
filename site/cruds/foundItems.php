<!-- found items -->
<?php
require 'template/header.php';
?>
<main class="container my-3 my-sm-4">
  <div class="d-flex justify-content-between align-items-end">
    <h1 class="text-warning d-flex align-items-center IBMPlexMonoFont m-0"><ion-icon name="file-tray-full" class="me-2 page-identificator-icon"></ion-icon>ITENS ENCONTRADOS</h1>
    <a href="../index.php" class="d-flex align-items-center return-to-home fw-semibold mb-1">Voltar<ion-icon name="arrow-undo" class="ms-1"></ion-icon></a>
  </div>
  <div class="page-title-divider w-100 my-1"></div>
  <span class="text-secondary mb-4 d-block text-center text-sm-start">Nesta página, você encontrará uma lista de todos os itens que foram achados e registrados no sistema de achados e perdidos.</span>
  <div class="container">
    <?php
    require '../database/dbConfig.php';
    $sql = 'SELECT fi.name, fi.description, fi.date_of_find, fi.place_of_find, c.name AS category
            FROM found_items AS fi
            JOIN categories AS c ON fi.category_id = c.id;';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $found_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($found_items) > 0) {
      echo ($_SESSION['role'] == 1) ? '<a href="registerFoundItem.php" class="fw-semibold add-item-button d-flex align-items-center"><ion-icon name="add-circle-outline" class="me-1 add-item-icon"></ion-icon>Registrar</a>' : null;
    ?>
      <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <tr class="text-center align-middle">
              <th>Nome</th>
              <th class="max-md-width">Descrição</th>
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
            foreach ($found_items as $item) {
              echo '<tr class="text-center align-middle">';
              echo '<td>' . $item['name'] . '</td>';
              echo '<td class="text-start description-td-maxwidth">' . $item['description'] . '</td>';
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
                      <a class="btn d-flex align-items-center justify-content-center dropdown-item">
                        <ion-icon name="brush-outline" class="me-1 action-icon"></ion-icon>Editar
                      </a>
                    </li>
                    <li>
                      <button type="button" class="btn d-flex align-items-center justify-content-center dropdown-item" data-bs-toggle="modal" data-bs-target="#moveModal">
                        <ion-icon name="checkbox-outline" class="me-1 action-icon"></ion-icon>Mover
                      </button>
                    </li>
                    <li>
                      <button type="button" class="btn d-flex align-items-center justify-content-center dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <ion-icon name="trash-outline" class="me-1 action-icon"></ion-icon>Excluir
                      </button>
                    </li>
                  </ul>
                </div>
            <?php
                echo '</td>';
              }
              echo '</tr>';
              echo '<!-- Delete action modal -->
              <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Aviso!</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Você realmente deseja excluir o item <span class="text-danger">"' . $item['name'] .
                '"</span>? Essa ação não pode ser desfeita.</div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <form method="post" action="">
                      
                      </form>
                      <button type="button" class="btn btn-primary">Excluir</button>
                    </div>
                  </div>
                </div>
              </div>';
              echo '<!-- Move action modal -->
              <div class="modal fade" id="moveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Aviso!</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Você realmente deseja escluir o item <span class="text-danger">"' . $item['name'] .
                '"</span>? Essa ação não pode ser desfeita.</div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>';
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
