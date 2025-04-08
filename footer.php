<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Footer Navigation Menu</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <style>
            * {
                padding: 0;
                margin: 0;
            }
            .footer {
                display: flex;
                padding: 20px;
                gap: 20px;
                background-color: black;
                font-family: arial;
                height: 20%;
                width: auto;
                justify-content: space-evenly;
            }
            .footer-content h4 {
                color: white;
            }
            .footer-content a{
                display: block;
                text-decoration: none;
                color: white;
            }
            .footer-content a:hover {
                color: rgb(255, 215, 0);
            }
            .socials {
                font-size: 36px;
            }
            .socials i {
                margin: 10px;
                color: white;
            }
            .socials i:hover {
                color: rgb(255, 215, 0);
            }
        </style>
    </head>
<body>
    <section class="footer">
        <div class="footer-content">
            <h4>Menu</h4>
            <a href="food.php">Food</a>
            <a href="drink.php">Drinks</a>
            <a href="merchandise.php">Merchandise</a>
        </div>
        <div class="footer-content">
            <h4>Career</h4>
            <a href="workingAtMCF.php">Working at My Coffee Friend</a>
            <a href="position.php">Position</a>
        </div>
        <div class="footer-content">
            <a href="location.php">Location</a>
        </div>
        <div class="footer-content">
            <h4>About Us</h4>
            <a href="ourCompany.php">Our Company</a>
            <a href="contactUs.php">Contact us</a>
        </div>
        <div class="footer-content">
            <a href="login.php">Login</a>
        </div>
        <div class="socials">
            <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://x.com/?lang=en"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
        </div>
    </section>
</body>
</html>