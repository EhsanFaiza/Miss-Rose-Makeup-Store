<?php
session_start();
include('./includes/connect.php'); // Correct path to your DB connection

if (isset($_GET['id'])) {
    $cartId = intval($_GET['id']);
    $customerId = $_SESSION['CustomerID']; // Assumed session variable

    // Delete the item from the cart
    $sql = "DELETE FROM cart WHERE CartID = ? AND CustomerID = ?";
    $stmt = $conn->prepare($sql); // $conn is the MySQLi connection object
    $stmt->bind_param("ii", $cartId, $customerId);
    $stmt->execute();

    // Redirect back to the cart page
    header('Location: cart.php');
    exit;
}
?>
