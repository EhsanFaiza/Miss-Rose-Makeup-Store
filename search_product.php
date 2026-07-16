<?php
session_start();
include('includes/connect.php'); // Include database connection

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Initialize variables
$searchQuery = '';
$products = [];

// Handle search query
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchQuery = trim($_GET['search']);
    $sql = "SELECT * FROM product WHERE Name LIKE ? OR Category LIKE ? OR Brand LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$searchQuery%", "%$searchQuery%", "%$searchQuery%"]);
    $products = $stmt->fetchAll();
} else {
    // Fetch all products if no search query is provided
    $sql = "SELECT * FROM product";
    $stmt = $pdo->query($sql);
    $products = $stmt->fetchAll();
}

// Handle add to cart functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $customerId = $_SESSION['CustomerID'] ?? null; // Ensure session has CustomerID

    if ($customerId) {
        // Check if product is already in the cart
        $sql = "SELECT * FROM cart WHERE CustomerID = ? AND ProductID = ? AND Status = 'active'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$customerId, $productId]);
        $cartItem = $stmt->fetch();

        if ($cartItem) {
            // Update quantity if already in cart
            $sql = "UPDATE cart SET Quantity = Quantity + ? WHERE CartID = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$quantity, $cartItem['CartID']]);
        } else {
            // Add new product to cart
            $sql = "INSERT INTO cart (CustomerID, ProductID, Quantity, DateAdded, Status) VALUES (?, ?, ?, NOW(), 'active')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$customerId, $productId, $quantity]);
        }

        echo "<p style='color: green;'>Product added to cart successfully!</p>";
    } else {
        echo "<p style='color: red;'>Please log in to add products to your cart.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <h1>Search Products</h1>

        <!-- Search Form -->
        <form method="GET" action="search_product.php">
            <input type="text" name="search" placeholder="Search products..." value="<?php echo htmlspecialchars($searchQuery); ?>">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- Product Results -->
        <?php if (!empty($products)): ?>
            <div class="product-grid">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="<?php echo htmlspecialchars($product['Image']); ?>" alt="<?php echo htmlspecialchars($product['Name']); ?>" class="product-image">
                        <h3><?php echo htmlspecialchars($product['Name']); ?></h3>
                        <p><strong>Category:</strong> <?php echo htmlspecialchars($product['Category']); ?></p>
                        <p><strong>Brand:</strong> <?php echo htmlspecialchars($product['Brand']); ?></p>
                        <p><strong>Price:</strong> <?php echo number_format($product['Price'], 2); ?> PKR</p>
                        <p><strong>Description:</strong> <?php echo htmlspecialchars($product['Description']); ?></p>

                        <!-- Add to Cart Form -->
                        <form method="POST" action="search_product.php">
                            <input type="hidden" name="product_id" value="<?php echo $product['ProductID']; ?>">
                            <label for="quantity_<?php echo $product['ProductID']; ?>">Quantity:</label>
                            <input type="number" id="quantity_<?php echo $product['ProductID']; ?>" name="quantity" value="1" min="1" required>
                            <button type="submit" name="add_to_cart" class="btn btn-success">Add to Cart</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
