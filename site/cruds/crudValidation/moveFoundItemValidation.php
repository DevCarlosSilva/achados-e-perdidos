<?php
if (
  isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['dateOfReturn']) && isset($_POST['receiverName']) && isset($_POST['category_id']) &&
  !empty(trim($_POST['id'])) && !empty(trim($_POST['name'])) && !empty(trim($_POST['description'])) && !empty(trim($_POST['dateOfReturn'])) && !empty(trim($_POST['receiverName'])) && !empty(trim($_POST['category_id']))
) {
  require '../../database/dbConfig.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $receiverName = $_POST['receiverName'];
  $dateOfReturn = $_POST['dateOfReturn'];
  $category_id = $_POST['category_id'];
  $sql = 'DELETE FROM found_items WHERE id = :id';
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  $sql = 'INSERT INTO returned_items(name, description, receiver_name, date_of_return, category_id) VALUES(:name, :description, :receiverName, :dateOfReturn, :category_id);';
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':name', $name);
  $stmt->bindValue(':description', $description);
  $stmt->bindValue(':receiverName', $receiverName);
  $stmt->bindValue(':dateOfReturn', $dateOfReturn);
  $stmt->bindValue(':category_id', $category_id);
  $stmt->execute();
  header('Location: ../foundItems.php?alert=itemMoved&name=' . $name);
} else {
  header('Location: ../moveFoundItem.php?alert=invalidValues&id=' . $_POST['id'] . '&name=' . $_POST['name'] . '&description=' . $_POST['description'] . '&dateOfReturn=' . $_POST['dateOfReturn'] . '&receiverName=' . $_POST['receiverName'] . '&id_category=' . $_POST['category_id'] . '');
}
