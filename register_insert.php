<?php
mb_internal_encoding("utf8");

$pdo = new  PDO("mysql:dbname=php_lesson01; host=localhost;", "root", "");

$stmt = $pdo->prepare("insert into login_mypage(name,mail,password,picture,comments)value(?,?,?,?,?)");

$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['picture']);
$stmt->bindValue(5,$_POST['comments']);

$stmt->execute();
$pdo = NULL;

header('Location:after_register.html');

/*
$pdo->exec("insert into login_mypage(name,mail,password,picture,comments)
values(
  '" . $_POST['name'] . "',
  '" . $_POST['mail'] . "',
  '" . $_POST['password'] . "',
  '" . $_POST['picture'] . "',
  '" . $_POST['comments'] . "'
);");
*/