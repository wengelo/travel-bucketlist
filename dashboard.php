<?php $imgPath = "assets/images/"; ?>



<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$planned = $conn->query("SELECT COUNT(*) as c FROM user_destinations WHERE user_id='$user_id' AND status='planned'")->fetch_assoc()['c'];
$visited = $conn->query("SELECT COUNT(*) as c FROM user_destinations WHERE user_id='$user_id' AND status='visited'")->fetch_assoc()['c'];


$sql = "SELECT ud.id as user_dest_id, ud.status, d.*
        FROM user_destinations ud
        JOIN destinations d ON ud.destination_id = d.id
        WHERE ud.user_id='$user_id'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card-img-top {
            height: 180px;
            object-fit: cover;
        }

        .hero {
            background: linear-gradient(to right, #dd0606c5, #fe0055a9);
            color: white;
            padding: 40px;
            border-radius: 15px;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-5">


        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>🌍 Travel Dashboard</h2>
            <div>
                <a href="explore.php" class="btn btn-primary me-2">🌍 Explore</a>
                <a href="auth/logout.php" class="btn btn-outline-danger">Logout</a>
            </div>
        </div>

        <div class="hero mb-5 text-center">
            <h1>Hello, <?php echo htmlspecialchars($_SESSION['username']); ?> 👋</h1>
            <p>Your personal travel planner</p>
        </div>


        <div class="row text-center mb-5">
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm p-4">
                    <h5>✈️ Planned Trips</h5>
                    <h2><?php echo $planned; ?></h2>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card shadow-sm p-4">
                    <h5>✅ Visited Places</h5>
                    <h2><?php echo $visited; ?></h2>
                </div>
            </div>
        </div>


        <h3 class="mb-3">📍 Your Destinations</h3>

        <div class="row">

            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>

                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100">

                            <img
                                src="<?php echo $imgPath . htmlspecialchars($row['image']); ?>"
                                class="card-img-top"
                                onerror="this.src='<?php echo $imgPath; ?>default.jpg';">

                            <div class="card-body d-flex flex-column">

                                <h5><?php echo $row['name']; ?></h5>
                                <small class="text-muted"><?php echo $row['country']; ?></small>

                                <p class="mt-2">
                                    Status:
                                    <strong>
                                        <?php echo $row['status'] == 'visited' ? '✅ Visited' : '✈️ Planned'; ?>
                                    </strong>
                                </p>


                                <div class="mt-auto">

                                    <a href="update_status.php?id=<?php echo $row['user_dest_id']; ?>"
                                        class="btn btn-warning w-100 mb-2">
                                        🔄 Change Status
                                    </a>

                                    <a href="remove_from_list.php?id=<?php echo $row['user_dest_id']; ?>"
                                        class="btn btn-outline-danger w-100">
                                        ❌ Remove
                                    </a>

                                </div>

                            </div>

                        </div>
                    </div>

                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-muted">No destinations added yet 😢</p>
            <?php endif; ?>

        </div>

    </div>

</body>

</html>