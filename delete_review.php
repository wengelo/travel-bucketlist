<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$review_id = (int) $_POST['review_id'];

$stmt = $conn->prepare(
    "SELECT destination_id
     FROM reviews
     WHERE id = ? AND user_id = ?"
);

$stmt->execute([$review_id, $_SESSION['user_id']]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("Not allowed.");
}

$destination_id = $row['destination_id'];

$stmt = $conn->prepare(
    "DELETE FROM reviews
     WHERE id = ? AND user_id = ?"
);

$stmt->execute([$review_id, $_SESSION['user_id']]);

header("Location: details.php?id=" . $destination_id);
exit();