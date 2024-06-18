<?php
require 'template/header.php';
if ($_SESSION['role'] == 0) {
  header('Location: ../index.php');
}
?>
<main class="container my-3 my-sm-4">
  <div class="d-flex justify-content-between align-items-end">
    <h1 class="text-warning d-flex align-items-center IBMPlexMonoFont m-0"><ion-icon name="add-circle-outline" class="me-2 page-identificator-icon"></ion-icon>REGISTRAR ITEM DEVOLVIDO</h1>
    <a href="returnedItems.php" class="d-flex align-items-center return-to-home fw-semibold mb-1">Voltar<ion-icon name="arrow-undo" class="ms-1"></ion-icon></a>
  </div>
  <div class="page-title-divider w-100 my-1"></div>
  <span class="text-secondary mb-4 d-block text-center text-sm-start">Nesta página, você pode adicionar itens a lista de itens devolvidos.</span>
  <?php
  if (isset($_GET['alert'])) {
    switch ($_GET['alert']) {
      case "successfullyAddedItem":
        echo '<div class="alert alert-success d-flex align-items-center justify-content-between fw-semibold alert-max-width mx-auto" role="alert">
              <div class="d-flex align-items-center">      
              <ion-icon name="checkmark-circle-outline" class="alert-icons"></ion-icon>
              <div class="mx-2">O item ' . $_GET['itemName'] . ' foi adicionado!</div>
              </div>
              <a href="registerReturnedItem.php" class="btn-close"></a>
            </div>';
        break;
      case "invalidValues":
        echo '<div class="alert alert-danger d-flex align-items-center justify-content-between fw-semibold alert-max-width mx-auto" role="alert">
              <div class="d-flex align-items-center">      
              <ion-icon name="warning" class="alert-icons"></ion-icon>
              <div class="mx-2">Alguma informação gerou um erro. Verifique e tente novamente</div>
              </div>
              <a href="registerReturnedItem.php" class="btn-close"></a>
            </div>';
        break;
    }
  }
  ?>
  <div class="w-100 mx-auto crud-form-container mt-md-5">
    <form action="crudValidation\registerReturnedItemValidation.php" method="post" class="needs-validation" novalidate>
      <div class="form-floating mb-3">
        <input name="name" id="name" class="form-control" placeholder="Nome do item" required>
        <label for="name">Nome do item</label>
      </div>
      <div class="form-floating mb-3">
        <textarea name="description" class="form-control" placeholder="Descrição do item" id="description" style="height: 100px" required></textarea>
        <label for="description">Descrição do item</label>
      </div>
      <div class="mb-3 row row-gap-3">
        <div class="col-md">
          <div class="form-floating">
            <input type="datetime-local" name="dateOfReturn" id="dateOfReturn" class="form-control" placeholder="Data da devolução" required>
            <label for="dateOfReturn">Data de devolução</label>
          </div>
        </div>
        <div class="col-md">
          <div class="form-floating">
            <input name="receiverName" id="receiverName" class="form-control" placeholder="Nome do receptor" required>
            <label for="receiverName">Nome do receptor</label>
          </div>
        </div>
      </div>
      <div>
        <label for="category_id">Categoria:</label>
        <select name="category_id" id="category_id" class="form-select mt-1 mb-3">
          <?php
          require '../database/dbConfig.php';
          $sql = 'SELECT * FROM categories';
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
          foreach ($categories as $category) {
            echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
          }
          ?>
        </select>
      </div>
      <div class="row gap-1">
        <input type="submit" value="Adicionar item" class="btn btn-success col-md">
        <a href="returnedItems.php" class="btn btn-dark col-md">Cancelar</a>
      </div>
    </form>
  </div>
</main>
<script defer>
  // Capturar todos os form com class need-validaion e pra cada form ele adiciona um controlador de evento ao botão de submit checando os inputs e deixando ou não o form ser enviado
  (() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>
<?php
require 'template/footer.php';
?>