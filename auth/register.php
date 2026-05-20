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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm_password']);

    if ($password !== $confirm) {

        $error = "Passwords do not match";
    } elseif (strlen($password) < 8) {

        $error = "Password must be at least 8 characters";
    } else {


        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $check->bind_param("s", $username);
        $check->execute();

        $result = $check->get_result();

        if ($result->num_rows > 0) {

            $error = "Username already exists";
        } else {

            $sql = "INSERT INTO users (username, email, password)
                    VALUES (?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $hashedPassword);

            if ($stmt->execute()) {

                header("Location: login.php");
                exit;
            } else {

                $error = "Something went wrong";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>

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

        .auth-card {
            width: 450px;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            color: white;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }

        .form-control {
            border-radius: 12px;
            padding: 12px;
        }

        .input-group-text {
            border-radius: 12px 0 0 12px;
        }

        .btn-travel {
            background: #ff5a5f;
            border: none;
            color: white;
            padding: 12px;
            border-radius: 12px;
            font-weight: bold;
        }

        .btn-travel:hover {
            background: #ff4045;
        }

        a {
            color: white;
        }

        .small-text {
            font-size: 14px;
            color: #ddd;
        }
    </style>
</head>

<body>

    <div class="container h-100">

        <div class="d-flex justify-content-center align-items-center h-100">

            <div class="auth-card">

                <h1 class="text-center fw-bold mb-2">
                    🌍 Create Account
                </h1>

                <p class="text-center text-light mb-4">
                    Start building your dream bucket list ✈️
                </p>

                <?php if (isset($error)): ?>

                    <div class="alert alert-danger">
                        <?= $error ?>
                    </div>

                <?php endif; ?>

                <form method="POST">

                    <div class="input-group mb-3">

                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>

                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            placeholder="Username"
                            required>

                    </div>

                    <div class="input-group mb-3">

                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            placeholder="Email"
                            required>

                    </div>

                    <div class="input-group mb-3">

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

                    <div class="input-group mb-2">

                        <span class="input-group-text">
                            <i class="bi bi-shield-lock"></i>
                        </span>

                        <input
                            type="password"
                            name="confirm_password"
                            class="form-control"
                            placeholder="Confirm Password"
                            required>

                    </div>

                    <p class="small-text mb-4">
                        Password should contain at least 8 characters.
                    </p>


                    <button class="btn btn-travel w-100">
                        Create Account
                        </a>
                    </button>

                </form>

                <p class="text-center mt-4 mb-0">
                    Already have an account?
                    <a href="login.php">Login</a>
                </p>

            </div>

        </div>

    </div>

</body>

</html>