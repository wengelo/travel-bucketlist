<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$review_id = (int) $_POST['review_id'];


$stmt = $conn->prepare("SELECT destination_id FROM reviews WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $review_id, $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Not allowed.");
}

$row = $result->fetch_assoc();
$destination_id = $row['destination_id'];


$stmt = $conn->prepare("DELETE FROM reviews WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $review_id, $_SESSION['user_id']);
$stmt->execute();

header("Location: details.php?id=" . $destination_id);
exit();