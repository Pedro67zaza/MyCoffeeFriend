<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Coffee Friend - Location</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: arial;
            font-weight: bold;
        }
        .map {
            display: flex;
            padding: 20px;
        }
        .map-details {
            background-color: pink;
            display: block;
            border-radius: 0.5rem;
        }
        .map-details h3, h4 {
            padding: 20px;
        }
    </style>
</head>
<body>
    <?php include("navigationBar.php"); ?>
    <section class="map">
        <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.2202722943894!2d101.76154337319646!3d3.035499553844459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc35abb3eff249%3A0x31b6a213d5899562!2sZUS%20Coffee%20-%20Cheras%20Traders%20Square!5e0!3m2!1sen!2smy!4v1742777137248!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
        <div class="map-details">
            <h3>83A- G, Jalan Dataran Cheras 4, Dataran Perniagaan Cheras Cheras, 43200 Kuala Lumpur, Selangor</h3>
            <h4>Phone no: 012-8161340</h4>
            <h4>Operating hours: 9:00 a.m to 10:00 p.m</h4>
            <h4>Customer's review:</h4>
            <h4><i>"You have the best people working here. I came one day with my autistic son. I order another drink, not his usual green tea latte, for him to try. He was not happy and threw a tantrum. Your staff handled the situation with kindness and grace. People seldom show kindness towards autistic children. Your staff on morning shift on 20 Jan was wonderful, definitely classy. I am grateful. The coffee as always, good."</i></h4>
        </div>
    </section>
    <section class="map">
        <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.0771088968877!2d101.58791017319653!3d3.074078353613239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4c5f80b3cf97%3A0x56c8d9650bbccaa0!2sStarbucks%20SS15%2C%20Subang%20Jaya!5e0!3m2!1sen!2smy!4v1742778039273!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
        <div class="map-details">
            <h3>Ground Floor, No. 77 & 79, Jalan SS 15/8a, Ss 15, 47500 Subang Jaya, Selangor</h3>
            <h4>Phone no: 03-5611 6819</h4>
            <h4>Operating hours: 7:30 a.m to 11:00 p.m</h4>
            <h4>Customer's review:</h4>
            <h4><i>"Wonderful service by Aniq ,Hani and Izman, customer interaction is very good..drink quality is best compared to any branch .they are execellent representative for My Coffee Friend  ...one of the reason I'm still loyal customer to Ss15 branch eventhough I travel from a far location .. one of my family hangout spot for gathering for the drinks, environment and service ...keep doing well.. 10 star ✨😄"</i></h4>
        </div>
    </section>

    <?php  include("footer.php"); ?>
</body>
</html>