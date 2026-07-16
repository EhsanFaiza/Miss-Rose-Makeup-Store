<?php
require 'vendor/autoload.php';

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

session_start();

// PayPal API credentials
$clientId = "YOUR_PAYPAL_CLIENT_ID"; // Replace with your PayPal Client ID
$clientSecret = "YOUR_PAYPAL_CLIENT_SECRET"; // Replace with your PayPal Client Secret

// Set up the PayPal API context
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential($clientId, $clientSecret)
);

// Check if the total amount is set in the session
if (!isset($_SESSION['TotalAmount'])) {
    die("Total amount is not set in the session.");
}

$totalAmount = $_SESSION['TotalAmount']; // Get the total amount from the session

// Create a new payer
$payer = new Payer();
$payer->setPaymentMethod("paypal");

// Create an item for the transaction
$item = new Item();
$item->setName("Order Payment") // Item name
    ->setCurrency("USD") // Currency code
    ->setQuantity(1) // Quantity
    ->setPrice($totalAmount); // Price per item

// Create an item list and add the item to it
$itemList = new ItemList();
$itemList->setItems([$item]);

// Set the total amount for the transaction
$amount = new Amount();
$amount->setCurrency("USD") // Currency code
    ->setTotal($totalAmount); // Total amount

// Create a transaction
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Payment for your order") // Description of the transaction
    ->setInvoiceNumber(uniqid()); // Unique invoice number

// Set the redirect URLs for success and cancellation
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("http://localhost/mrms/paypal_success.php") // Replace with your success URL
    ->setCancelUrl("http://localhost/mrms/paypal_cancel.php"); // Replace with your cancellation URL

// Create a payment
$payment = new Payment();
$payment->setIntent("sale") // Payment intent: "sale" for immediate payment
    ->setPayer($payer) // Payer information
    ->setRedirectUrls($redirectUrls) // Redirect URLs
    ->setTransactions([$transaction]); // Transaction details

// Try to create the payment
try {
    $payment->create($apiContext);
    // Redirect the user to PayPal for approval
    header("Location: " . $payment->getApprovalLink());
    exit;
} catch (Exception $e) {
    // Handle errors
    echo "Error creating PayPal payment: " . $e->getMessage();
    exit;
}
?>
