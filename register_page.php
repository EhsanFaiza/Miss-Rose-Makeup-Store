<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Regitration</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for additional styling -->
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 500px;
            margin-top: 100px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            background-color: #ffffff;
        }

        .card-header {
            background-color:rgb(1, 2, 2);
            color: white;
            font-size: 24px;
            text-align: center;
            padding: 15px 0;
            border-radius: 10px 10px 0 0;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .btn-primary {
            background-color:rgb(42, 47, 53);
            border-color:rgb(0, 0, 0);
            width: 100%;
        }

        .btn-primary:hover {
            background-color:rgb(106, 110, 116);
            border-color:rgb(3, 16, 31);
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 12px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .alert {
            margin-top: 15px;
            padding: 10px;
            text-align: center;
            font-size: 16px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
     <!-- Include the header -->

<?php include 'header.php'; ?> 

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Customer Registration</h3>
            </div>
            <form action="register.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <!-- Alert for registration success or failure -->
            <div id="alert-message" class="alert alert-danger mt-3" style="display:none;"></div>
        </div>
        <div class="footer">
            <p>Already have an account? <a href="\Login.php">Login here</a></p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        // Optionally, you can use JavaScript to show alert messages dynamically
        function showAlert(message, type) {
            const alertMessage = document.getElementById('alert-message');
            alertMessage.textContent = message;
            alertMessage.className = `alert alert-${type} mt-3`;
            alertMessage.style.display = 'block';
        }
    </script>
</body>
</html>
