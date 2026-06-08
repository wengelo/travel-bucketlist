
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$destination_id = (int)$_GET['id'];


$stmt = $conn->prepare("
    SELECT 1
    FROM user_destinations
    WHERE user_id = ? AND destination_id = ?
");

$stmt->execute([
    $user_id,
    $destination_id
]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$result) {

    $insert = $conn->prepare("
        INSERT INTO user_destinations (user_id, destination_id, status)
        VALUES (?, ?, 'planned')
    ");

    $insert->execute([
        $user_id,
        $destination_id
    ]);
}

header("Location: explore.php");
exit();
?>