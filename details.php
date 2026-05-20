<?php $imgPath = "assets/images/"; ?>

<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include 'db.php';

$id = intval($_GET['id'] ?? 0);


$stmt = $conn->prepare("SELECT * FROM destinations WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$destResult = $stmt->get_result();

if ($destResult->num_rows == 0) {
    die("Destination not found.");
}

$destination = $destResult->fetch_assoc();


$reviewStmt = $conn->prepare("
    SELECT r.*, u.username
    FROM reviews r
    JOIN users u ON r.user_id = u.id
    WHERE r.destination_id = ?
    ORDER BY r.created_at DESC
");

$reviewStmt->bind_param("i", $id);
$reviewStmt->execute();

$reviews = $reviewStmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($destination['name']); ?> - Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            height: 400px;
            object-fit: cover;
        }

        .review {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-5">


        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold"><?php echo htmlspecialchars($destination['name']); ?></h1>
            <a href="explore.php" class="btn btn-outline-secondary">⬅ Back</a>
        </div>


        <div class="card shadow-sm mb-5">
            <img
                src="<?php echo $imgPath . htmlspecialchars($destination['image']); ?>"
                class="card-img-top"
                onerror="this.src='<?php echo $imgPath; ?>default.jpg';">
            <div class="card-body">
                <span class="badge bg-primary mb-2"><?php echo ucfirst($destination['category']); ?></span>
                <p class="text-muted mb-1">🌍 <?php echo htmlspecialchars($destination['continent']); ?></p>
                <p class="text-muted mb-1">📍 <?php echo htmlspecialchars($destination['country']); ?></p>
                <p class="text-muted mb-1">📅<?php echo htmlspecialchars($destination['best_time']); ?></p>
                <p class="text-muted mb-1">✨<?php echo htmlspecialchars($destination['highlights']); ?></p>
                <p class="text-muted mb-1">🌍 Country Population: <?= number_format($destination['population']); ?>
                <p class="text-muted mb-1">⭐ <?php echo $destination['rating']; ?>/5</p>
                <p><?php echo nl2br(htmlspecialchars($destination['description'])); ?></p>

                <a href="add_to_list.php?id=<?php echo $destination['id']; ?>" class="btn btn-danger w-100 mb-3">➕ Add to my list</a>
            </div>
        </div>

        <h3 class="mb-3">Reviews</h3>

        <?php while ($rev = $reviews->fetch_assoc()): ?>
            <div class="review">
                <strong><?php echo htmlspecialchars($rev['username']); ?></strong>
                <span>⭐ <?php echo $rev['rating']; ?>/5</span>
                <p class="text-muted"><?php echo nl2br(htmlspecialchars($rev['comment'])); ?></p>
                <small class="text-muted"><?php echo $rev['created_at']; ?></small>

                <?php if ($rev['user_id'] == $_SESSION['user_id']): ?>
                    <div class="mt-2">

                        <a href="edit_review.php?id=<?php echo $rev['id']; ?>" class="btn btn-sm btn-warning">Edit</a>


                        <form action="delete_review.php" method="POST" style="display:inline;">
                            <input type="hidden" name="review_id" value="<?php echo $rev['id']; ?>">
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this review?');">
                                Delete
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>


        <div class="mt-5">
            <h4>Add a Review</h4>
            <form action="add_review.php" method="POST">
                <input type="hidden" name="destination_id" value="<?php echo $destination['id']; ?>">
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select class="form-select" name="rating" id="rating" required>
                        <option value="">Select</option>
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?> ⭐</option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea class="form-control" name="comment" id="comment" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-dark">
                    Submit Review
                </button>
            </form>
        </div>

    </div>
</body>

</html>