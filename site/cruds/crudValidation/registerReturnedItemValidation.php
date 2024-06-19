<?php
if (
  isset($_POST['name']) && isset($_POST['description']) && isset($_POST['dateOfReturn']) && isset($_POST['receiverName']) && isset($_POST['category_id']) &&
  !empty(trim($_POST['name'])) && !empty(trim($_POST['description'])) && !empty(trim($_POST['dateOfReturn'])) && !empty(trim($_POST['receiverName'])) && !empty(trim($_POST['category_id']))
) {
  require '../../database/dbConfig.php';
  $name = $_POST['name'];
  $description = $_POST['description'];
  $receiver_name = $_POST['receiverName'];
  $date_of_return = $_POST['dateOfReturn'];
  $category_id = $_POST['category_id'];
  $sql = 'INSERT INTO returned_items(name,description,receiver_name,date_of_return,category_id) VALUES(:name,:description,:receiver_name,:date_of_return,:category_id)';
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':receiver_name', $receiver_name);
  $stmt->bindParam(':date_of_return', $date_of_return);
  $stmt->bindParam(':category_id', $category_id);
  $stmt->execute();
  header("Location: ../registerReturnedItem.php?alert=successfullyAddedItem&name=" . $name);
} else {
  header('Location: ../registerReturnedItem.php?alert=invalidValues');
}
