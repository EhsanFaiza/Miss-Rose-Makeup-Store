<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Miss Rose Online Makeup Store</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff0f5;
            color: #333;
        }

        header {
            background-color:rgb(209, 87, 115);
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        header p {
            font-size: 1.2rem;
        }

        main {
            padding: 20px;
            text-align: center;
        }

        .hero {
            margin: 20px auto;
            max-width: 800px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .hero img {
            max-width: 400%;
            border-radius: 20px;
        }

        .hero h2 {
            color: #ff6f91;
            font-size: 2rem;
            margin: 20px 0;
        }

        .hero p {
            font-size: 1rem;
            line-height: 1.6;
        }

        .cta-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff6f91;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
        }

        .cta-button:hover {
            background-color: #ff5777;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body> 


    <!-- Include the header -->

<?php include 'header.php'; ?> 
    <header>
        <h1>Welcome to Miss Rose Online Makeup Store</h1>
        <p>Your ultimate destination for beauty and confidence.</p>
    </header>
    <main>
        <div class="hero">
            <img src=".\images\display.jpeg" alt="Makeup products displayed beautifully">
            <h2>Discover the Art of Beauty</h2>
            <p>At Miss Rose, we bring you a curated collection of premium-quality makeup products designed to enhance your unique style. Explore our range of face, eye, and lip essentials, and transform your beauty routine with ease.</p>
            <a href="shop.html" class="cta-button">Shop Now</a>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Miss Rose Online Makeup Store. All Rights Reserved.</p>
    </footer>
</body>
</html>
