<?php
session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];
$id = (int)$_GET['id']; 


$sql = "UPDATE user_destinations 
        SET status = IF(status='planned','visited','planned') 
        WHERE id='$id' AND user_id='$user_id'";

$conn->query($sql);

header("Location: dashboard.php");
exit();
?>