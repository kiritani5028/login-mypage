<?php
mb_internal_encoding("utf8");
session_start();

if($_FILES['picture']['size'] == 0){
  $path_filename = $_SESSION['picture'];
} else {
  $temp_pic_name = $_FILES['picture']['tmp_name'];
  $original_pic_name = $_FILES['picture']['name'];
  $path_filename = './image/' . $original_pic_name; //formで次のぺージにパスを送る際に使う
  
  move_uploaded_file($temp_pic_name, './image/' . $original_pic_name);
}

$pdo = new PDO("mysql:dbname=php_lesson01; host=localhost;", "root", "");

$stmt = $pdo->prepare("update login_mypage set name = ?, mail = ?, password = ?, picture = ?, comments = ? where id = ? ");

$stmt->bindValue(1, $_POST['name']);
$stmt->bindValue(2, $_POST['mail']);
$stmt->bindValue(3, $_POST['password']);
$stmt->bindValue(4, $path_filename);
$stmt->bindValue(5, $_POST['comments']);
$stmt->bindValue(6, $_SESSION['id']);

$stmt->execute();

$stmt = $pdo->prepare("select * from login_mypage where id = ?");

$stmt->bindValue(1, $_SESSION['id']);

$stmt->execute();
$pdo = NULL;

while ($row = $stmt->fetch()) {
  $_SESSION['name'] = $row['name'];
  $_SESSION['mail'] = $row['mail'];
  $_SESSION['password'] = $row['password'];
  $_SESSION['picture'] = $row['picture'];
  $_SESSION['comments'] = $row['comments'];
}

header("Location:mypage.php");
