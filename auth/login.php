
<?php

session_start();

$host = "localhost";
$dbname = "travel_bucketlist";
$username_db = "root";
$password_db = "";

$conn = new mysqli($host, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email_input = trim($_POST['email']);
    $password_input = trim($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email_input);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password_input, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: /First_Backend_Project/travel_bucketlist/dashboard.php");
        exit();

    } else {
        $error = "Wrong email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body {
    background:
        linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
        url('travel-bg.jpg');

    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
}

.auth-card{
    width: 420px;
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    padding: 40px;
    color: white;
    box-shadow: 0 8px 30px rgba(0,0,0,0.3);
}

.auth-card:hover{
    transform: translateY(-3px);
    transition: 0.3s;
}

.form-control{
    border-radius: 12px;
    padding: 12px;
}

.input-group-text{
    border-radius: 12px 0 0 12px;
}

.btn-travel{
    background: #ff5a5f;
    border: none;
    color: white;
    padding: 12px;
    border-radius: 12px;
    font-weight: bold;
}

.btn-travel:hover{
    background: #ff4045;
}

a{
    color: #fff;
}

</style>
</head>

<body>

<div class="container h-100">

    <div class="d-flex justify-content-center align-items-center h-100">

        <div class="auth-card">

            <h1 class="text-center fw-bold mb-2">
                🌍 Travel Bucket List
            </h1>

            <p class="text-center text-light mb-4">
                Explore dream destinations around the world ✈️
            </p>


            <form method="POST">

                <div class="input-group mb-3">

                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>

                    <input
                        type="text"
                        name="email"
                        class="form-control"
                        placeholder="email"
                        required>

                </div>

                <div class="input-group mb-4">

                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>

                    <input
                        type="password"
                        name="password" 
                        class="form-control"
                        placeholder="Password"
                        required>

                </div>

                <button class="btn btn-travel w-100">
                    Login
                </button>

            </form>

            <p class="text-center mt-4 mb-0">
                Don't have an account?
                <a href="register.php">Register</a>
            </p>

        </div>

    </div>

</div>

</body>
</html>
