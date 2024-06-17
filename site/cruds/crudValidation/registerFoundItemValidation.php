<?php
if (isset($_POST['name'], $_POST['description'], $_POST['dateOfFind'], $_POST['placeOfFind'], $_POST['category_id']) && !empty(trim($_POST['name'], $_POST['description']) && !empty(trim($_POST['dateOfFind'], $_POST['placeOfFind'])) && !empty(trim($_POST['category_id'])))) {
  require '../../database/dbConfig.php';
  $name = $_POST['name'];
  $description = $_POST['description'];
  $date_of_find = $_POST['dateOfFind'];
  $place_of_find = $_POST['placeOfFind'];
  $category_id = $_POST['category_id'];
  $sql = 'INSERT INTO found_items(name,description,date_of_find,place_of_find,category_id) VALUES(:name,:description,:date_of_find,:place_of_find,:category_id)';
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':date_of_find', $date_of_find);
  $stmt->bindParam(':place_of_find', $place_of_find);
  $stmt->bindParam(':category_id', $category_id);
  $stmt->execute();
  session_start();
  header('Location: ../registerFoundItem.php?alert=successfullyAddedItem');
} else {
  header('Location: ../registerFoundItem.php?alert=invalidValues');
}
