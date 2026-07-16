<?php
session_start();
include('./includes/connect.php'); // Correct path to your DB connection

if (!isset($_SESSION['CustomerID'])) {
    echo "Session not set!";
    exit;
}

$customerId = $_SESSION['CustomerID'];

// Fetch cart items to calculate total amount
$sql = "SELECT SUM(p.Price * c.Quantity) AS TotalAmount
        FROM cart c 
        JOIN product p ON c.ProductID = p.ProductID
        WHERE c.CustomerID = ? AND c.Status = 'active'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customerId);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$totalAmount = $row['TotalAmount'] ?? 0;

// Handle order creation if user proceeds to checkout
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
    // Create order in orders table
    $orderDate = date('Y-m-d H:i:s');
    $sql = "INSERT INTO orders (CustomerID, TotalAmount, OrderDate) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ids", $customerId, $totalAmount, $orderDate);
    $stmt->execute();

    $orderId = $stmt->insert_id; // Get the last inserted order ID

    // Move cart items to order_details table
    $sql = "SELECT ProductID, Quantity FROM cart WHERE CustomerID = ? AND Status = 'active'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($item = $result->fetch_assoc()) {
        $sql = "INSERT INTO order_details (OrderID, ProductID, Quantity, Price) 
                VALUES (?, ?, ?, 
                        (SELECT Price FROM product WHERE ProductID = ?))";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiii", $orderId, $item['ProductID'], $item['Quantity'], $item['ProductID']);
        $stmt->execute();
    }

    // Update cart status to 'completed'
    $sql = "UPDATE cart SET Status = 'completed' WHERE CustomerID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customerId);
    $stmt->execute();

    // Redirect to a confirmation page
    header('Location: confirmation.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .btn {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Checkout</h2>
        <p>Total Amount: <?php echo number_format($totalAmount, 2); ?></p>
        <form method="POST" action="payment_processing.php">
            
            
    <h3>Select Payment Method:</h3>
    <div>
        <input type="radio" id="cod" name="paymentMethod" value="COD" required>
        <label for="cod">Cash on Delivery</label>
    </div>
    <div>
        <input type="radio" id="paypal" name="paymentMethod" value="PayPal" required>
        <label for="paypal">Pay via PayPal</label>
    </div>
    <h3>Shipping Details:</h3>
    <div class="form-group">
        <label for="shippingName">Name</label>
        <input type="text" id="shippingName" name="shippingName" required>
    </div>
    <div class="form-group">
        <label for="shippingAddress">Address</label>
        <input type="text" id="shippingAddress" name="shippingAddress" required>
    </div>
    <div class="form-group">
        <label for="shippingCity">City</label>
        <input type="text" id="shippingCity" name="shippingCity" required>
    </div>
    <div class="form-group">
        <label for="shippingPhone">Phone</label>
        <input type="text" id="shippingPhone" name="shippingPhone" required>
    </div>
    <button type="submit" class="btn btn-success">Proceed to Payment</button>

            <button type="submit" name="checkout" class="btn">Confirm Order</button>
        </form>
    </div>
</body>
</html>
