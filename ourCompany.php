<?php
    include("navigationBar.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Our Company</title>

        <style>
            * {
                padding: 0;
                margin: 0;
            }
            .video-container {
                position: relative;
                max-height: 500px;
                width: auto;
                margin: 0 auto;
                overflow: hidden;
            }
            .video-container video {
                height: 100%;
                width: 100%;
                object-fit: cover;
            }
            .video-container h3 {
                position: absolute;
                text-decoration: none;
                font-weight: bold;
                font-family: arial;
                font-size: 40;
                color: white;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            .paragraph {
                height: auto;
                width: 100%;
                margin: 0 auto;
            }

            .paragraph h2, p {
                padding: 20px;
                font-family: arial;
                font-size: large;
            }
            .paragraph img {
                height: 80%;
                width: 100%;
            }
        </style>
    </head>
<body>
    <section class="video-container">
        <video autoplay muted>
            <source src="about_us_video.mp4" type="video/mp4">
        </video>
        <h3>Our Story</h3>
    </section>
    <section class="paragraph">
        <h2>The Turkiye Trip</h2>
        <p>
        Our journey began with a single trip—one that changed everything. It all started when Johan Liebert, 
        the founder of My Coffee Friend, visited Turkey. Captivated by the rich aromas, deep traditions, and 
        the art of coffee-making, he developed a deep fascination for coffee culture. Inspired by this experience, 
        he set out on a mission to bring that passion home and create a café that wasn’t just about serving coffee, 
        but about fostering meaningful connections. What began as a simple dream soon turned into something more. 
        <br><br>My Coffee Friend started as a small café, focused on serving high-quality, freshly brewed coffee. But 
        from the very beginning, it was never just about the coffee—it was about creating a space where people 
        could gather, share stories, and feel at home. We envisioned something different: a café where every 
        cup tells a story, where customers aren’t just guests but part of a community. With that vision, 
        My Coffee Friend grew, blending tradition with modern flavors and offering an experience that goes beyond 
        the drink in your hand. 
        </p>
        <img src="about_us.jpg" alt="About Us image">
        <p>
        Today, we continue to embrace our passion for coffee, ensuring that each cup is brewed with care, 
        and every visit feels like a warm welcome. At My Coffee Friend, coffee is more than a beverage—it’s a 
        bond, a culture, and a shared experience.
        <br><br>
        </p>
    </section>
    <?php include("footer.php"); ?>
</body>
</html>