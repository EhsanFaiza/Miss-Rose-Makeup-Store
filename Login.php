<?php
session_start();
include('.\includes\connect.php');

// Database connection variables
$host = "localhost";
$dbname = "mrms";
$username = "root";
$password = "";

// Establish connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validate inputs
    if (empty($email) || empty($password)) {
        $error = "Both email and password are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        // Prepare SQL query to fetch user
        $stmt = $conn->prepare("SELECT * FROM customers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify password
            if (password_verify($password, $row['Password'])) {
                // Store user information in session
                $_SESSION['user_id'] = $row['ID'];
                $_SESSION['user_name'] = $row['Name'];
                $_SESSION['user_email'] = $row['email'];

                // Redirect to the home page
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "No account found with that email.";
        }

        // Close the statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Miss Rose Makeup Store</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background-color: #f4f7fc; font-family: 'Arial', sans-serif;">

    <!-- Include the header -->
    <?php include('header.php'); ?>

    <div class="container" style="max-width: 350px; margin: 50px auto; padding: 30px; background-color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; margin-bottom: 30px; color: #333;">Login</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger" style="margin-top: 15px;"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email" style="font-weight: bold; color: #555;">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required style="border-radius: 5px; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            </div>
            <div class="form-group">
                <label for="password" style="font-weight: bold; color: #555;">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required style="border-radius: 5px; border: 1px solid #ccc; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            </div>
            <button type="submit" class="btn" style="width: 100%; padding: 15px; background-color: white; color: black; border: 1px solid black; border-radius: 5px; font-size: 16px; margin-bottom: 15px;">Login</button>
            <button type="button" class="btn" onclick="window.location.href='register_page.php';" style="width: 100%; padding: 15px; background-color: white; color: black; border: 1px solid black; border-radius: 5px; font-size: 16px; margin-bottom: 15px;">Create Account</button>
            <button type="button" class="btn" onclick="window.location.href='index.php';" style="width: 100%; padding: 15px; background-color: white; color: black; border: 1px solid black; border-radius: 5px; font-size: 16px;">Home</button>
        </form>
    </div>
</body>
</html>
