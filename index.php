<?php $imgPath = "assets/images/"; ?>

<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Travel Bucket List</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>


body{
    background:
        linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
        url('assets/images/bg.jpg');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh;
    color: white;
}

.btn-travel{
    background: #ff5a5f;
    border: none;
    color: white;

    padding: 14px 32px;
    border-radius: 12px;

    font-weight: 600;
    transition: 0.3s;
}

.btn-travel:hover{
    background: #ff4045;
    transform: translateY(-2px);
}

.btn-outline-custom{
    border: 2px solid white;
    color: white;

    padding: 14px 32px;
    border-radius: 12px;

    font-weight: 600;
    transition: 0.3s;
}

.btn-outline-custom:hover{
    background: white;
    color: black;
}

.features{
    margin-top: 40px;
}

.feature-box{
    padding: 20px;
}

.feature-box i{
    font-size: 2rem;
    margin-bottom: 10px;
    color: #ffb703;
}

.feature-box h5{
    font-weight: 600;
}

.feature-box p{
    font-size: 14px;
    color: #ddd;
}



</style>
</head>

<body>

<div class="hero d-flex justify-content-center align-items-center">

    <div class="hero-card text-center">

        <h1 class="hero-title mb-3">
            🌍 Travel Bucket List
        </h1>

        <p class="hero-text mb-4">
            Discover dream destinations, save your adventures,
            and build the ultimate travel bucket list ✈️
        </p>

        <div class="mb-5">

            <a href="auth/login.php"
               class="btn btn-travel btn-lg me-3">

               Login
            </a>

            <a href="auth/register.php"
               class="btn btn-outline-custom btn-lg">

               Register
            </a>

        </div>

        <div class="row features">

            <div class="col-md-4 feature-box">

                <i class="bi bi-airplane"></i>

                <h5>Explore</h5>

                <p>
                    Discover beautiful places around the world.
                </p>

            </div>

            <div class="col-md-4 feature-box">

                <i class="bi bi-heart"></i>

                <h5>Save Favorites</h5>

                <p>
                    Keep track of destinations you want to visit.
                </p>

            </div>

            <div class="col-md-4 feature-box">

                <i class="bi bi-globe-americas"></i>

                <h5>Travel More</h5>

                <p>
                    Turn your travel dreams into real adventures.
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>