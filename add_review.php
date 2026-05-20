<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}


if (!isset($_POST['destination_id'], $_POST['rating'], $_POST['comment'])) {
    die("Invalid request.");
}

$user_id = $_SESSION['user_id'];
$destination_id = (int) $_POST['destination_id'];
$rating = (int) $_POST['rating'];
$comment = trim($_POST['comment']);



if (empty($comment)) {
    die("Comment cannot be empty.");
}

$stmt = $conn->prepare("
    INSERT INTO reviews (user_id, destination_id, rating, comment, created_at)
    VALUES (?, ?, ?, ?, NOW())
");
$stmt->bind_param("iiis", $user_id, $destination_id, $rating, $comment);
$stmt->execute();



header("Location: details.php?id=" . $destination_id);
exit();