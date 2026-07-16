<?php
// Start session at the very beginning
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
include_once 'includes/connect.php';

// Check if the user is logged in
if (!isset($_SESSION['CustomerID'])) {
    die("Please log in to view your cart.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .table {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 10px;
            text-align: center;
        }
        .table img {
            width: 50px;
            height: 50px;
        }
        .total-amount {
            font-size: 1.5em;
            margin-top: 20px;
            text-align: right;
        }
        .checkout {
            text-align: right;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-danger {
            background-color: red;
            color: white;
        }
        .btn-success {
            background-color: green;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Include the header -->
    <?php include 'header.php'; ?>

    <div class="container">
        <h2>Your Shopping Cart</h2>
        <?php
        $customerId = $_SESSION['CustomerID'];
        $sql = "SELECT c.CartID, p.Name, p.Price, c.Quantity 
                FROM cart c
                JOIN product p ON c.ProductID = p.ProductID
                WHERE c.CustomerID = ? AND c.Status = 'active'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $customerId);
        $stmt->execute();
        $cartItems = $stmt->get_result();

        if ($cartItems->num_rows > 0) {
            echo "<table class='table'>";
            echo "<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th><th>Action</th></tr>";
            while ($item = $cartItems->fetch_assoc()) {
                echo "<tr>
                        <td>{$item['Name']}</td>
                        <td>{$item['Price']}</td>
                        <td>{$item['Quantity']}</td>
                        <td>" . $item['Price'] * $item['Quantity'] . "</td>
                        <td><a href='delete_from_cart.php?id={$item['CartID']}' class='btn btn-danger'>Remove</a></td>
                      </tr>";
            }
            echo "</table>";
            echo "<div class='checkout'>
                    <a href='index.php#bestSeller' class='btn btn-primary'>Continue Shopping</a>
                    <a href='checkout.php' class='btn btn-success'>Proceed to Checkout</a>
                  </div>";
        } else {
            echo "<p>Your cart is empty.</p>";
        }
        ?>
    </div>

    <div>
        <footer><p>All rights reserved by Faiza</p></footer>
    </div>

    <script src="index.js"></script>
    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
</body>
</html>
