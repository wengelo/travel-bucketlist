<?php
session_start();


$_SESSION = [];


session_destroy();


header("Location: /First_Backend_Project/travel_bucketlist/index.php");
exit();
?>