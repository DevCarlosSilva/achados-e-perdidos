<?php
if (isset($_POST['id']) && isset($_POST['name']) && !empty(trim($_POST['id'])) && !empty(trim($_POST['name']))) {
  require '../../database/dbConfig.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $sql = 'DELETE FROM returned_items WHERE id = :id';
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  header('Location: ../returnedItems.php?alert=itemDeleted&itemName=' . $name);
} else {
  header('Location: ../returned.php');
}
