<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];
$row_id = (int)$_GET['id']; 

$stmt = $conn->prepare("
    DELETE FROM user_destinations 
    WHERE id = ? AND user_id = ?
");

$stmt->bind_param("ii", $row_id, $user_id);
$stmt->execute();

header("Location: dashboard.php");
exit();
?>