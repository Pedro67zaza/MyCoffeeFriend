<!--  This program will handle the feedbacks sent by users  -->

<?php

//start the session
session_start();

// Include database connection
include("db_connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #333;
            color: white;
        }
        .feedback-content {
            display: none;
            max-width: 500px;
            white-space: pre-wrap;
            word-wrap: break-word;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-top: 5px;
        }
        .toggle-btn {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
            border: none;
            background: none;
            font-size: 14px;
            padding: 0;
        }
        .toggle-btn:hover {
            color: darkblue;
        }
        .header {
            height: auto;
            width: 100vw;
        }
        .header h2 {
            color: white;
            background-color: #333;
            padding: 20px;
        }
        h3 {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Customer Feedback</h2>
</div>
    <?php 
    // Fetch feedback from database
    $sql = "SELECT feedback_id, name, email, contact, store_visited, feedback FROM feedback ORDER BY feedback_id DESC";
    $result = mysqli_query($connect, $sql);

    //check if the table contains data 
    if(mysqli_num_rows($result) === 0) {    ?>
        <h3>Table is empty!</h3>
<?php }
    else {  ?>
        <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Store Visited</th>
            <th>Feedback</th>
            <th>Delete</th>
        </tr>

    <?php
        //while loop to fetch each row
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['contact']) ?></td>
                <td><?= htmlspecialchars($row['store_visited']) ?></td>
                <td>
                <!--  create a button where it will called on the JS toggleFeedback() function -->
                    <button class="toggle-btn" onclick="toggleFeedback(<?= $row['feedback_id'] ?>)">View Feedback</button>
                    <div class="feedback-content" id="feedback<?= $row['feedback_id'] ?>">
                        <!--  Convert the \n to <br>  -->
                        <?= nl2br(htmlspecialchars($row['feedback'])) ?>
                    </div>
                </td>
            <td><a href="delete.php?id=<?=$row['feedback_id'];?>&type=feedback" class="btn btn-danger">Delete</a></td>
        </tr>
    <?php } 
    }   ?>
</table>

<script>
    //toggleFeedback function will take in the id 
    function toggleFeedback(id) {
        var feedback = document.getElementById("feedback" + id);
        //if feedback is not displayed at the time of click, dislay it in a block
        if (feedback.style.display === "none" || feedback.style.display === "") {
            feedback.style.display = "block";
        }
        //if the feedback is displayed at the time of click 
        else {
            feedback.style.display = "none";
        }
    }
</script>

</body>
</html>
