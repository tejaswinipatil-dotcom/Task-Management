<?php session_start(); include 'db.php';
if(!isset($_SESSION['uid'])) exit;
$id=$_GET['id']; $uid=$_SESSION['uid'];
$stmt=$conn->prepare("DELETE FROM tasks WHERE id=? AND user_id=?");
$stmt->bind_param("ii",$id,$uid); $stmt->execute();
header('Location:dashboard.php');