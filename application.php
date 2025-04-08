<!--  This program will handle the job applications made by users  -->

<?php

//start the session
session_start();

// Include database connection
include("db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Applications</title>
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
        a {
            text-decoration: none;
            color: blue;
        }
        a:hover {
            text-decoration: underline;
        }
        .cover-letter {
            display: none;
            max-width: 400px;
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
            width: 100%;
        }
        .header h2 {
            background-color: #333;
            color: white;
            padding: 20px;
        }
        h3 {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Job Applications</h2>
</div>
    <?php 
        // Fetch resumes from database
        $sql = "SELECT resume_id, firstName, lastName, email, phone_number, 
                position, applicant_resume, cover_letter FROM job_resume";
        $result = mysqli_query($connect, $sql);

        //if the table is empty
        if(mysqli_num_rows($result) === 0) {    ?>
            <h3>Table is empty!</h3>
<?php    }
        //if the table contains data
        else {  ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Position</th>
                    <th>Cover Letter</th>
                    <th>Resume</th>
                    <th>Delete</th>
                </tr>
        <?php
            //fetch each row
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= htmlspecialchars($row['firstName'] . " " . $row['lastName']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['phone_number']) ?></td>
                    <td><?= htmlspecialchars($row['position']) ?></td>
                    <td>
                        <!-- check if the cover letter was submitted -->
                        <?php if (!empty($row['cover_letter'])) { ?>
                        <!--  create a button where it will called on the JS toggleCoverLetter() function -->
                            <button class="toggle-btn" onclick="toggleCoverLetter(<?= $row['resume_id'] ?>)">View Cover Letter</button>
                            <div class="cover-letter" id="coverLetter<?= $row['resume_id'] ?>">
                        <!--  Convert the \n to <br>  -->
                                <?= nl2br(htmlspecialchars($row['cover_letter'])) ?>
                            </div>
                <?php  }  ?>
                    </td>
                    <td>
                        <!--  check if the resume was uploaded  -->
                        <?php if (!empty($row['applicant_resume'])) { ?>
                        <!--  retrieve the applicant's resume (file path) and open it in a new tab  -->
                        <a href="<?= htmlspecialchars($row['applicant_resume']) ?>" target="_blank">View Resume</a>
                    <?php } ?>
                    </td>
                    <td><a href="delete.php?id=<?=$row['resume_id'];?>&type=jobApplication" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php } 
             } ?>
</table>

<script>
    //toggleCoverLetter function will take in the id
    function toggleCoverLetter(id) {
        var coverLetter = document.getElementById("coverLetter" + id);
        if (coverLetter.style.display === "none" || coverLetter.style.display === "") {
            coverLetter.style.display = "block";
        } else {
            coverLetter.style.display = "none";
        }
    }
</script>

</body>
</html>
