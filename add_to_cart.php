<?php
session_start();
include('includes/connect.php');

if (!isset($_SESSION['CustomerID'])) {
    die("Please log in to add items to your cart.");
}

$customerId = $_SESSION['CustomerID'];
$productId = intval($_POST['product_id']);
$quantity = intval($_POST['quantity']);

if ($productId > 0 && $quantity > 0) {
    $sql = "SELECT * FROM cart WHERE CustomerID = ? AND ProductID = ? AND Status = 'active'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $customerId, $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $sql = "UPDATE cart SET Quantity = Quantity + ? WHERE CustomerID = ? AND ProductID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $quantity, $customerId, $productId);
    } else {
        $sql = "INSERT INTO cart (CustomerID, ProductID, Quantity, Status) VALUES (?, ?, ?, 'active')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $customerId, $productId, $quantity);
    }

    if ($stmt->execute()) {
        header("Location: cart.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid input.";
}
?>
