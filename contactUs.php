<?php
// Include database connection
include("db_connect.php");

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['feedback']) && isset($_POST['name_1']) && isset($_POST['email']) && 
        isset($_POST['contact']) && isset($_POST['store_visited']))
     {
        $feedback = htmlspecialchars($_POST['feedback']);
        $name = htmlspecialchars($_POST['name_1']);
        $email = htmlspecialchars($_POST['email']);
        $contact = htmlspecialchars($_POST['contact']);
        $store_visited = $_POST['store_visited'];

        $sql = "INSERT INTO feedback (feedback, name, email, contact, store_visited)
                VALUES ('$feedback', '$name', '$email', '$contact', '$store_visited')";

        if (mysqli_query($connect, $sql)) {
                echo "Feedback submitted successfully!";
                header("Location: contactUs.php");
                exit();
            } else {
                echo "Database error: " . mysqli_error($connect);
            }
        }
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>

        <style>
            * {
                padding: 0;
                margin: 0;
            }
            .image-container {
                position: relative;
                max-height: 400px;
                width: auto;
                margin: 0 auto;
                overflow: hidden;
            }
            .image-container img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .image-container h2 {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: white;
                font-family: arial;
                font-weight: bold;
                font-size: 40px;
            }
            .text-container {
                height: auto;
                width: 100%;
                margin: 0 auto;
            }
            .text-container h3, h4, p {
                padding: 20px;
                font-family: arial;
                font-size: 20px;
            }
            .form-container {
                height: auto;
                width: 80%;
                margin: 0 auto;
            }
            .form-container label, input, textarea {
                align-items: center;
                margin-bottom: 10px;
            }
            #button {
                padding: 10px 40px;
                background-color: green;
                color: white;
                border-radius: 0.5rem;
                cursor: pointer;
            }
        </style>
    </head>
<body>
    <?php include("navigationBar.php"); ?>

    <section class="image-container">
        <img src="contact_us.jpg" alt="Contact Us at My Coffee Friend">
        <h2>Feedback & Queries</h2>
    </section>
    <div class="text-container">
        <h3>Feedback and Queries</h3>
        <p>
        At My Coffee Friend, your feedback matters to us as we constantly 
        work to enhance your experience. Have suggestions on how we can improve? 
        Encountered any challenges that need our attention? Or simply have a question for us? 
        Let us know—we're listening, and we take it to heart.
        </p>
    </div>
    <form method="post" class="form-container">
        <label for="feedback">Give us a feedback or ask anything that comes to your mind</label><br><br>
        <textarea name="feedback" id="feedback" rows="20" cols="120" required></textarea><br><br>

        <label for="name_1">Name:</label><br><br>
        <input type="text" name="name_1" id="name_1" size="100" required><br><br>

        <label for="email">Email:</label><br><br>
        <input type="email" name="email" id="email" placeholder="Active email address" size="100" required><br><br>

        <label for="contact">Contact No:</label><br><br>
        <input type="tel" name="contact" id="contact" placeholder="01X-XXXXXXX" size="100" required><br><br>

        <label for="store_visited">Store Visited:</label><br><br>
        <select name="store_visited" id="store_visited">
            <option value=""> -- Select a store -- </option>
            <option value="Cheras, Kuala Lumpur">Cheras, Kuala Lumpur</option>
            <option value="SS15, Selangor">SS15, Selangor</option>
        </select><br><br>

        <input type="submit" value="submit" id="button"><br><br>
    </form>

    <?php  include("footer.php"); ?>
</body>
</html>