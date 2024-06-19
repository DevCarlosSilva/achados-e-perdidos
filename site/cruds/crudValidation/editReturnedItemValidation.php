<?php
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['dateOfReturn']) && isset($_POST['receiverName']) && isset($_POST['category_id']) && !empty(trim($_POST['id'])) && !empty(trim($_POST['name'])) && !empty(trim($_POST['description'])) && !empty(trim($_POST['dateOfReturn'])) && !empty(trim($_POST['receiverName'])) && !empty(trim($_POST['category_id']))) {
  require '../../database/dbConfig.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $dateOfReturn = $_POST['dateOfReturn'];
  $receiverName = $_POST['receiverName'];
  $category_id = $_POST['category_id'];
  $sql = 'UPDATE returned_items SET name = :name, description = :description, date_of_return = :dateOfReturn, receiver_name = :receiverName, category_id = :category_id WHERE id = :id;';
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':name', $name);
  $stmt->bindValue(':description', $description);
  $stmt->bindValue(':dateOfReturn', $dateOfReturn);
  $stmt->bindValue(':receiverName', $receiverName);
  $stmt->bindValue(':category_id', $category_id);
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  header('Location: ../returnedItems.php?alert=itemEdited&name=' . $name);
} else {
  header('Location: ../editReturnedItem.php?alert=invalidValues&id=' . $_POST['id'] . '&name=' . $_POST['name'] . '&description=' . $_POST['description'] . '&dateOfReturn=' . $_POST['dateOfReturn'] . '&receiverName=' . $_POST['receiverName'] . '&id_category=' . $_POST['category_id'] . '');
}
