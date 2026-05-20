<?php $imgPath = "assets/images/"; ?>

<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include 'db.php';


$where = [];
$params = [];
$types = "";

$search = $_GET['search'] ?? '';
$continent = $_GET['continent'] ?? '';
$category = $_GET['category'] ?? '';

if (!empty($search)) {
    $where[] = "(name LIKE ? OR country LIKE ?)";
    $searchTerm = "%$search%";
    $params[] = $searchTerm;
    $params[] = $searchTerm;
    $types .= "ss";
}

if (!empty($continent)) {
    $where[] = "continent = ?";
    $params[] = $continent;
    $types .= "s";
}

if (!empty($category)) {
    $where[] = "category = ?";
    $params[] = $category;
    $types .= "s";
}

$sql = "SELECT * FROM destinations";

if (count($where) > 0) {
    $sql .= " WHERE " . implode(" AND ", $where);
}

$stmt = $conn->prepare($sql);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();

$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Explore Destinations</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card:hover {
            transform: scale(1.02);
            transition: 0.2s;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-5">

        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold">🌍 Explore</h1>
            <a href="dashboard.php" class="btn btn-outline-secondary">⬅ Back</a>
        </div>

        <form method="GET" class="row mb-5">

           
            <div class="col-md-4 mb-2">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Search (Japan, Paris...)"
                    value="<?php echo htmlspecialchars($search); ?>">
            </div>

            
            <div class="col-md-3 mb-2">
                <select name="continent" class="form-select">
                    <option value="">All Continents</option>
                    <option value="Europe" <?php if ($continent == 'Europe') echo 'selected'; ?>>Europe</option>
                    <option value="Asia" <?php if ($continent == 'Asia') echo 'selected'; ?>>Asia</option>
                    <option value="Africa" <?php if ($continent == 'Africa') echo 'selected'; ?>>Africa</option>
                    <option value="North America" <?php if ($continent == 'North America') echo 'selected'; ?>>North America</option>
                    <option value="South America" <?php if ($continent == 'South America') echo 'selected'; ?>>South America</option>
                    <option value="Oceania" <?php if ($continent == 'Oceania') echo 'selected'; ?>>Oceania</option>
                </select>
            </div>

            <div class="col-md-3 mb-2">
                <select name="category" class="form-select">
                    <option value="">All Types</option>
                    <option value="city" <?php if ($category == 'city') echo 'selected'; ?>>City</option>
                    <option value="nature" <?php if ($category == 'nature') echo 'selected'; ?>>Nature</option>
                    <option value="beach" <?php if ($category == 'beach') echo 'selected'; ?>>Beach</option>
                    <option value="adventure" <?php if ($category == 'adventure') echo 'selected'; ?>>Adventure</option>
                </select>
            </div>


            <div class="col-md-2 mb-2">
                <button class="btn btn-dark w-100">Filter</button>
            </div>

        </form>

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




                                <span class="badge bg-primary mb-2">
                                    <?php echo ucfirst($row['category']); ?>
                                </span>


                                <h5 class="fw-bold"><?php echo htmlspecialchars($row['name']); ?></h5>
                                <small class="text-muted mb-2"><?php echo htmlspecialchars($row['country']); ?></small>


                                <p class="mb-1">🌍 <?php echo htmlspecialchars($row['continent']); ?></p>
                                <p>⭐ <?php echo $row['rating']; ?>/5</p>


                                <p class="text-muted flex-grow-1">
                                    <?php echo substr(htmlspecialchars($row['description']), 0, 100); ?>...
                                </p>


                                <div class="mt-auto">

                                    <a href="details.php?id=<?php echo $row['id']; ?>"
                                        class="btn btn-dark w-100 mb-2">
                                        📄 View Details
                                    </a>

                                    <a href="add_to_list.php?id=<?php echo $row['id']; ?>"
                                        class="btn btn-danger w-100">
                                        ➕ Add to my list
                                    </a>

                                </div>

                            </div>

                        </div>
                    </div>

                <?php endwhile; ?>

            <?php else: ?>
                <p class="text-center text-muted">No destinations found 😢</p>
            <?php endif; ?>

        </div>

    </div>

</body>

</html>