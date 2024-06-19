<?php
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['dateOfFind']) && isset($_POST['placeOfFind']) && isset($_POST['category_id']) && !empty(trim($_POST['id'])) && !empty(trim($_POST['name'])) && !empty(trim($_POST['description'])) && !empty(trim($_POST['dateOfFind'])) && !empty(trim($_POST['placeOfFind'])) && !empty(trim($_POST['category_id']))) {
  require '../../database/dbConfig.php';
  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $dateOfFind = $_POST['dateOfFind'];
  $placeOfFind = $_POST['placeOfFind'];
  $category_id = $_POST['category_id'];
  $sql = 'UPDATE found_items SET name = :name, description = :description, date_of_find = :dateOfFind, place_of_find = :placeOfFind, category_id = :category_id WHERE id = :id;';
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':name', $name);
  $stmt->bindValue(':description', $description);
  $stmt->bindValue(':dateOfFind', $dateOfFind);
  $stmt->bindValue(':placeOfFind', $placeOfFind);
  $stmt->bindValue(':category_id', $category_id);
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  header('Location: ../foundItems.php?alert=itemEdited&itemName=' . $name);
} else {
  header('Location: ../editFoundItem.php?alert=invalidValues&id=' . $_POST['id'] . '&name=' . $_POST['name'] . '&description=' . $_POST['description'] . '&dateOfFind=' . $_POST['dateOfFind'] . '&placeOfFind=' . $_POST['placeOfFind'] . '&id_category=' . $_POST['category_id'] . '');
}
