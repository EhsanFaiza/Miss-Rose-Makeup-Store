<?php
// aboutUs.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Miss Rose Online Makeup Store</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #ff6f91;
            color: #fff;
            padding: 8px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        main {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        section {
            margin-bottom: 20px;
        }

        section h2 {
            color: #ff6f91;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        section ul {
            list-style: none;
            padding: 0;
        }

        section ul li {
            margin: 10px 0;
            padding-left: 20px;
            position: relative;
        }

        section ul li::before {
            content: '\2022';
            color: #ff6f91;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background: #333;
            color: #fff;
            margin-top: 20px;
        }

        footer p {
            margin: 0;
        }

        a {
            color: #ff6f91;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

 <!-- Include the header -->

 <?php include 'header.php'; ?> 

 
    <header>
        <h1>About Us</h1>
    </header>
    <main>
        <section>
            <p>Welcome to <strong>Miss Rose Online Makeup Store</strong>, your one-stop destination for premium-quality makeup products at your fingertips. We believe that beauty is for everyone, and our mission is to empower individuals to express their unique style and confidence through makeup that’s both affordable and luxurious.</p>
        </section>

        <section>
            <h2>Who We Are</h2>
            <p>Miss Rose Online Makeup Store is a trusted name in the beauty industry, dedicated to providing a seamless shopping experience for makeup enthusiasts and professionals alike. With years of expertise in cosmetics, we have become synonymous with quality, innovation, and customer satisfaction. Our online platform brings the magic of Miss Rose to your doorstep, offering a wide array of products designed to suit every skin tone, occasion, and style.</p>
        </section>

        <section>
            <h2>What We Offer</h2>
            <ul>
                <li><strong>Face:</strong> Foundations, concealers, blushes, and highlighters to create flawless looks.</li>
                <li><strong>Eyes:</strong> Eyeshadows, eyeliners, mascaras, and eyebrow products for captivating eye makeup.</li>
                <li><strong>Lips:</strong> Lipsticks, glosses, and liners in a spectrum of shades to suit every mood.</li>
                <li><strong>Tools & Accessories:</strong> Brushes, sponges, and other tools to perfect your application.</li>
            </ul>
            <p>Our products are crafted with care, ensuring they meet the highest standards of quality, performance, and safety. Whether you’re a beginner exploring makeup or a seasoned artist, we have something for everyone.</p>
        </section>

        

        <section>
            <h2>Our Vision</h2>
            <p>At Miss Rose Online Makeup Store, we envision a world where everyone feels confident in their skin. We strive to inspire creativity and self-expression through makeup, fostering a community of beauty lovers who celebrate diversity and individuality.</p>
        </section>

        <section>
            <h2>Join Us</h2>
            <p>Explore our collections, find your favorites, and transform your makeup routine with Miss Rose. Stay connected with us on social media for the latest updates, tips, and exclusive offers. Together, let’s redefine beauty, one product at a time.</p>
            <p>Thank you for choosing Miss Rose Online Makeup Store. Your beauty journey begins here!</p>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Miss Rose Online Makeup Store. All Rights Reserved.</p>
    </footer>
</body>
</html>