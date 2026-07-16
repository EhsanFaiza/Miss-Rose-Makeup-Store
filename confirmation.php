<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Redirect to index.php if accessed directly
    header('Location: index.php');
    exit;
}

// Retrieve the shipping details from the POST request
$shippingName = htmlspecialchars($_POST['shippingName']);
$shippingAddress = htmlspecialchars($_POST['shippingAddress']);
$shippingCity = htmlspecialchars($_POST['shippingCity']);
$shippingPhone = htmlspecialchars($_POST['shippingPhone']);

// Retrieve order total from session or previous logic
$totalAmount = $_SESSION['TotalAmount'] ?? 0;

// Clear the session variables related to the order
unset($_SESSION['TotalAmount']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-align: center;
        }
        .btn {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
    <script>
        // Redirect to index.php after 5 seconds
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 5000);
    </script>
</head>
<body>
    <div class="container">
        <h2>Thank You for Your Order!</h2>
        <p>Your order has been successfully placed.</p>
        <h3>Order Summary</h3>
        <p><strong>Total Amount:</strong> <?php echo number_format($totalAmount, 2); ?></p>
        <h3>Shipping Details</h3>
        <p><strong>Name:</strong> <?php echo $shippingName; ?></p>
        <p><strong>Address:</strong> <?php echo $shippingAddress; ?></p>
        <p><strong>City:</strong> <?php echo $shippingCity; ?></p>
        <p><strong>Phone:</strong> <?php echo $shippingPhone; ?></p>
        <p>You will be redirected to the homepage shortly...</p>
        <a href="index.php" class="btn">Go to Homepage</a>
    </div>
</body>
</html>
