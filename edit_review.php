<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $review_id = (int) $_POST['review_id'];
    $rating = (int) $_POST['rating'];
    $comment = trim($_POST['comment']);

    if ($rating < 1 || $rating > 5 || empty($comment)) {
        die("Invalid input.");
    }

    
    $stmt = $conn->prepare("
        UPDATE reviews 
        SET rating = ?, comment = ?, updated_at = NOW()
        WHERE id = ? AND user_id = ?
    ");
    $stmt->bind_param("isii", $rating, $comment, $review_id, $user_id);
    $stmt->execute();

    $stmt = $conn->prepare("SELECT destination_id FROM reviews WHERE id = ?");
    $stmt->bind_param("i", $review_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    header("Location: details.php?id=" . $row['destination_id']);
    exit();
}


$review_id = (int) ($_GET['id'] ?? 0);

$stmt = $conn->prepare("
    SELECT * FROM reviews 
    WHERE id = ? AND user_id = ?
");
$stmt->bind_param("ii", $review_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: explore.php");
exit();
}

$review = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Review</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm p-4 mx-auto" style="max-width:600px;">

        <h2 class="mb-4">Edit Review</h2>

        <form method="POST">

            <input type="hidden" name="review_id"
                   value="<?php echo $review['id']; ?>">

            
            <div class="mb-3">
                <label class="form-label">Rating</label>

                <select name="rating" class="form-select" required>

                    <?php for ($i = 1; $i <= 5; $i++): ?>

                        <option value="<?php echo $i; ?>"
                            <?php if ($review['rating'] == $i) echo 'selected'; ?>>

                            <?php echo $i; ?> ⭐

                        </option>

                    <?php endfor; ?>

                </select>
            </div>

            
            <div class="mb-3">

                <label class="form-label">Comment</label>

                <textarea
                    name="comment"
                    class="form-control"
                    rows="5"
                    required><?php echo htmlspecialchars($review['comment']); ?></textarea>

            </div>

            
            <div class="d-flex gap-2">

                <button type="submit" class="btn btn-dark">
                    Update Review
                </button>

                <a href="javascript:history.back()"
                   class="btn btn-outline-secondary">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>