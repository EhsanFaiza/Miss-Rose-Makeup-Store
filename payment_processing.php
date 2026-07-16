<?php
session_start();
include('./includes/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $paymentMethod = $_POST['paymentMethod'];
    $shippingName = htmlspecialchars($_POST['shippingName']);
    $shippingAddress = htmlspecialchars($_POST['shippingAddress']);
    $shippingCity = htmlspecialchars($_POST['shippingCity']);
    $shippingPhone = htmlspecialchars($_POST['shippingPhone']);
    $totalAmount = $_SESSION['TotalAmount'] ?? 0;

    if ($paymentMethod === 'COD') {
        // Process Cash on Delivery
        // Save order details in the database
        $orderDate = date('Y-m-d H:i:s');
        $sql = "INSERT INTO orders (CustomerID, TotalAmount, OrderDate, PaymentMethod) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("idss", $_SESSION['CustomerID'], $totalAmount, $orderDate, $paymentMethod);
        $stmt->execute();

        // Redirect to confirmation
        header("Location: confirmation.php");
        exit;
    } elseif ($paymentMethod === 'PayPal') {
        // Redirect to PayPal payment
        $_SESSION['shippingDetails'] = [
            'name' => $shippingName,
            'address' => $shippingAddress,
            'city' => $shippingCity,
            'phone' => $shippingPhone,
        ];
        header("Location: paypal_payment.php");
        exit;
    } else {
        echo "Invalid payment method selected.";
    }
}
?>
