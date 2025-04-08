<?php
include("navigationBar.php");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Working at My Coffee Friend</title>

        <style>
            * {
                padding: 0;
                margin: 0;
                font-family: arial;
                font-size: large;
            }
            .firstSequence {
                text-decoration: none;
                position: relative;
                max-height: 40rem;
                width: auto;
                overflow: hidden;
                font-family: arial;
            }
            .firstSequence img {
                height: 100%;
                width: 100%;
                object-fit: cover;
            }
            .text-overlay {
                position: absolute;
                color: white;
                top: 20%;
                left: 5%;
                transform: translate(-5%, -20%);
                text-align: center;
            }
            .text-overlay h2 {
                font-size: 2rem;
                margin-bottom: 0.5rem;
            }

            .text-overlay h3 {
                font-size: 1.5rem;
            }
            .secondSequence {
                display: flex;
                max-height: 40rem;
                width: auto;
                overflow: hidden;
                justify-content: space-between;
                border: 2px solid black;
            }
            .secondSequence img {
                height: 50%;
                width: 50%;
                object-fit: cover;
            }
            .secondSequence-text {
                text-align: center;
                margin: auto;
            }
            .policy {
                display: flex;
                max-height: 40rem;
                width: auto;
                justify-content: space-between;
            }
            .policy-detail {
                display: block;
                padding: 20px;
                height: auto;
                width: 50%;
            }
        </style>
    </head>
<body>
    <div class="firstSequence">
        <img src="worker_1.jpg" alt="">
        <div class="text-overlay">
            <h2>Your Identity, Our Brand</h2>
            <h3>The perfect mix.</h3>
        </div>
    </div>
    <div class="secondSequence">
        <div class="secondSequence-text">
            <h2>My Coffee Friend - More Than Just Coffee</h2>
            <p>At My Coffee Friend, we strive to be more than just a coffee shop. 
                From the very beginning, our goal has been to create a space that not 
                only celebrates the art of coffee but also fosters meaningful connections. 
                We’re passionate about delivering a complete and fulfilling café experience—one                     that goes beyond what’s in your cup. We’re more than a place to grab your favorite brew; we’re a welcoming spot where the community comes together, 
                a part of your daily routine. Everything we do is guided by a commitment to quality, connection, and 
                responsibility—ensuring that every sip, every visit, and every interaction is rooted in warmth and purpose.
            </p>
        </div>
        <img src="worker_2.jpg" alt="">
    </div>
    <div class="policy">
        <div class="policy-detail">
            <h2>Our Vision</h2>
            <p>To create a welcoming space where coffee lovers and communities come together, 
                fostering warmth, connection, and unforgettable experiences—one cup at a time.
            </p>
        </div>
        <div class="policy-detail">
        <h2>Our Mission</h2>
            <p>
            At My Coffee Friend, we are committed to delivering more than just great coffee. 
            We aim to craft high-quality, ethically sourced beverages while building an inclusive, 
            vibrant café culture. Through exceptional service, sustainable practices, and a passion for innovation, 
            we strive to be a place where every customer feels valued, inspired, and at home.
            </p>
        </div>
    </div>

    <?php  include("footer.php"); ?>
</body>
</html>