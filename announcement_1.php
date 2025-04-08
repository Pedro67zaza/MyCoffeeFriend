<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement - Charity Program</title>

    <style>
        * {
            padding: 0;
            margin: 0;
        }
        .image {
            position: relative;
            max-height: 400px;
            width: auto;
            margin: 0 auto;
            overflow: hidden;
            }
        .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .image h2 {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: white;
                font-family: arial;
                font-weight: bold;
                font-size: 30px;
                width: 80%;
            }
            .text-container {
                height: auto;
                width: 100%;
                margin: 0 auto;
            }
            .text-container p {
                padding: 20px;
                font-family: arial;
                font-size: 20px;
                margin-bottom: 50px;
            }
    </style>
</head>
<body>
    <?php include("navigationBar.php"); ?>
    <section class="image">
        <img src="contact_us.jpg" alt="Coffee Beans">
        <h2>My Coffee Friend Gives Back: Brewing Hope Through Charity</h2>
    </section>
    <div class="text-container">
        <p>
        At My Coffee Friend, we believe that a great cup of coffee is best enjoyed with a heart full of kindness. 
        Beyond serving quality coffee, we are committed to making a meaningful impact on the communities we cherish.
         That’s why we’re proud to introduce our "Brew for a Better Tomorrow" initiative—a heartfelt effort dedicated
          to supporting local charities, feeding the hungry, and uplifting those in need. 
          <br><br>Through this program, 
          a portion of every purchase will go towards causes that truly matter. Whether it’s providing warm meals 
          to underserved communities, supporting education programs for underprivileged children, or contributing 
          to sustainability efforts that protect our planet, we want every sip to bring warmth—not just to our 
          customers but to those who need it most. 
          <br><br>"As a brand deeply connected to the community, we recognize 
          the importance of giving back," said Giovani Lo Celso, CEO of My Coffee Friend. "Our mission extends 
          beyond coffee—we want to be a force for good. Through this initiative, we hope to create opportunities, 
          spark hope, and spread kindness in every way possible."Our journey starts with small steps, but 
          together, we can make a big difference. Whether it's through volunteering, donations, or simple acts 
          of generosity, we invite you to be a part of this movement. Every cup you enjoy at My Coffee Friend is 
          more than just a beverage—it's a step toward a brighter, more compassionate world.
          <br><br>
          Join us in brewing kindness, one cup at a time. Because together, we can create a future filled with 
          warmth, generosity, and hope.
        </p>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>