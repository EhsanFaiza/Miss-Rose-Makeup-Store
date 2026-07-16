<?php
include('../includes/connect.php'); // Ensure the path and connection are correct

if (isset($_POST['insert_categories'])) {
    // Retrieve and sanitize input
    $category_title = trim($_POST['CategoryName']);

    // Validate input
    if (empty($category_title)) {
        echo "<script>alert('Please enter a category name.');</script>";
    } else {
        // Use a prepared statement to prevent SQL injection
        $insert_query = "INSERT INTO `category` (CategoryName) VALUES (?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("s", $category_title);

        // Execute query and check result
        if ($stmt->execute()) {
            echo "<script>alert('Category has been inserted successfully.');</script>";
        } else {
            echo "<script>alert('Error inserting category: " . $stmt->error . "');</script>";
        }

        // Close the statement
        $stmt->close();
    }
}
?>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1">
            <i class="fa solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="CategoryName" placeholder="Insert Categories" 
        aria-label="Category" aria-describedby="basic-addon1" required>
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <button type="submit" name="insert_categories" value="Insert Categories" class="bg-info p-2 m-3 border-0">
            Insert Categories
        </button>
    </div>
</form>
