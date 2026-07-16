<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection file (correct path)
include_once 'includes/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miss Rose Products - Miss Rose Makeup Store</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

main {
    padding: 20px;
    max-width: 1200px;
    margin: auto;
}

/* Product container */
.products-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

/* Product card */
.product-card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s;
}

.product-card:hover {
    transform: scale(1.03);
}

/* Image container */
.image-container {
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.product-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Product info */
.product-info {
    padding: 10px;
}

.product-info h3 {
    margin: 0 0 10px;
    font-size: 1.2em;
    color: #555;
}

.product-info p {
    margin: 5px 0;
    color: #777;
}
.product-info form {
            margin-top: 10px;
        }

        .product-info button {
            background-color: #ff4081;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .product-info button:hover {
            background-color: #e0356b;
        }

        /* Description styling */
        .product-description {
            margin-top: 10px;
            font-size: 0.9em;
            color: #666;
        }
        .add-to-cart-btn {
    background-color: #ff4081; /* Pink color */
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s ease;
}

.add-to-cart-btn:hover {
    background-color: #e0356b; /* Darker pink */
}

    </style>
</head>
<body>
   <!-- Include the header -->
   <?php include 'header.php'; ?>

    <main>
        <h2>Miss Rose Products</h2>
        <div class="products-container">
            <?php
            // Check if the connection was successful
            if ($conn) {
                // Query to fetch eyes products from the database
                $query = "SELECT * FROM product WHERE Brand = 'Miss Rose'";
                $result = mysqli_query($conn, $query);

                // Check if products exist
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Ensure all required keys exist and have fallback defaults
                        $productId = isset($row['ID']) ? htmlspecialchars($row['ID']) : 'unknown';
                        $productName = isset($row['Name']) ? htmlspecialchars($row['Name']) : 'No Name';
                        $productBrand = isset($row['Brand']) ? htmlspecialchars($row['Brand']) : 'Unknown Brand';
                        $productPrice = isset($row['Price']) ? htmlspecialchars($row['Price']) : '0.00';
                        $productDescription = isset($row['Description']) ? htmlspecialchars($row['Description']) : 'No description available.';
                        $productImage = isset($row['Image']) ? htmlspecialchars($row['Image']) : 'placeholder.png';
                        
                        echo '<div class="product-card">';
                        echo '<div class="image-container">';
                        echo '<a href="#description-' . $productId . '">';
                        echo '<img src="' . htmlspecialchars($row['Image']) . '" alt="' . htmlspecialchars($row['Name']) . '" class="product-image">';
                        echo '</a>';
                        echo '</div>';
                        echo '<div id="description-' . $productId . '" class="product-description">';
                        echo '<h3>' . $productName . '</h3>';
                        echo '<p><strong>Brand:</strong> ' . $productBrand . '</p>';
                        echo '<p><strong>Price:</strong> $' . $productPrice . '</p>';
                        echo '<p>' . $productDescription . '</p>';
                        echo '<button type="submit" name="add_to_cart">Add to Cart</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No eyes products available at the moment.</p>';
                }

                // Free result set and close connection
                mysqli_free_result($result);
                mysqli_close($conn);
            } else {
                echo '<p>Database connection failed. Please try again later.</p>';
            }
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Miss Rose Makeup Store</p>
    </footer>
</body>
</html>
