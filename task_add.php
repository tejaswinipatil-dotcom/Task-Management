<?php session_start(); include 'db.php';
if(!isset($_SESSION['uid'])) exit;
$uid=$_SESSION['uid']; $t=$_POST['title'];
$stmt=$conn->prepare("INSERT INTO tasks(user_id,title) VALUES(?,?)");
$stmt->bind_param("is",$uid,$t); $stmt->execute();
header('Location:dashboard.php');