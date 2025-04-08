<?php
// Include database connection
include("db_connect.php");

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && 
        isset($_POST['contact']) && isset($_POST['position']) && isset($_POST['interviewDate']) &&
        isset($_POST['time']) && isset($_POST['coverLetter']) && isset($_FILES['resume'])
    ) {
        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $email = htmlspecialchars($_POST['email']);
        $contact = htmlspecialchars($_POST['contact']);
        $position = $_POST['position'];
        $interviewDate = $_POST['interviewDate'];
        $time = $_POST['time'];
        $coverLetter = htmlspecialchars($_POST['coverLetter']);

        // Check if file upload has any error
        if (!isset($_FILES['resume']) || $_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
            echo "Error uploading file: " . $_FILES['resume']['error'];
            exit;
        }

        // Handle file upload
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true); // Create folder if it doesn't exist
        }

        $resume_name = basename($_FILES["resume"]["name"]);
        $resume_path = $target_dir . $resume_name;
        $resume_type = strtolower(pathinfo($resume_path, PATHINFO_EXTENSION));

        $allowed_types = ['pdf', 'doc', 'docx'];

        if (in_array($resume_type, $allowed_types)) {
            if (move_uploaded_file($_FILES["resume"]["tmp_name"], $resume_path)) {
                // Check if resume already exists
                $checkSql = "SELECT resume_id FROM job_resume WHERE email = '$email' AND phone_number = '$contact'";
                $checkResult = mysqli_query($connect, $checkSql);

                if (mysqli_num_rows($checkResult) > 0) {
                    echo "Resume already exists.";
                } else {
                    $sql = "INSERT INTO job_resume (firstName, lastName, email, phone_number, position, interview_date, interview_time, cover_letter, applicant_resume)
                            VALUES ('$firstName', '$lastName', '$email', '$contact', '$position', '$interviewDate', '$time', '$coverLetter', '$resume_path')";

                    if (mysqli_query($connect, $sql)) {
                        echo "Resume submitted successfully!";
                        header("Location: position.php");
                        exit();
                    } else {
                        echo "Database error: " . mysqli_error($connect);
                    }
                }
            } else {
                echo "File upload failed!";
            }
        } else {
            echo "Invalid file type! Only PDF, DOC, and DOCX are allowed.";
        }
    }
}

?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Job Application Form</title>

        <style>
            * {
                padding: 0;
                margin: 0;
            }
            img {
                max-height: 100px;
                width: auto;
                display: block;
                margin: auto;
            }
            body {
                background-color: rgb(38, 22, 21);
            }

            .application {
                text-decoration: none;
                font-family: arial;
                display: block;
                height: auto;
                max-width: 800px;
                margin: auto;
                padding: 20px;
                background-color: white;
            }
            .application label, input, select, textarea {
                margin-bottom: 20px;
                align-items: center;
            }
            #button {
                padding: 10px 50px;
                background-color: gray;
                color: white;
                cursor: pointer;
            }
            
        </style>
    </head>
<body>
    <a href="home.php"><img src="logo.png" alt="My Coffee Friend Logo"></a>
    <form method="post" enctype="multipart/form-data" class="application">
        <h2>Job Application Form</h2>
        <h4>Please Fill Out the Form Below to Submit Your Job Application!</h4>
        <label for="name">Name:</label><br>
        <input type="text" name="firstName" id="name" placeholder="First Name" required>
        <input type="text" name="lastName" placeholder="Last Name" required>
        <br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" placeholder="example@gmail.com" required><br>

        <label for="contact">Phone no:</label><br>
        <input type="tel" name="contact" id="contact" placeholder="01X-XXXXXXX" required><br>

        <label for="position">Position of Interest:</label><br>
        <select name="position" id="position">
            <option value=""> -- Select a position -- </option>
            <option value="Barista">Barista</option>
            <option value="Manager">Manager</option>
            <option value="Pastry Chef">Pastry Chef</option>
        </select>
         <br>

         <label for="interviewDate">Preferred Interview Date:</label><br>
         <input type="date" name="interviewDate" id="interviewDate" required><br>

         <label for="time">Preferred time:</label><br>
         <input type="time" name="time" id="time" required><br>

         <label for="coverLetter">Cover letter:</label><br>
         <textarea name="coverLetter" id="coverLetter" rows="10" cols="100"></textarea><br>

         <label for="resume">Please upload your resume (PDF, DOC, DOCX only):</label><br>
         <input type="file" name="resume" id="resume" required><br>

         <input type="submit" value="submit" id="button">
    </form>
</body>
</html>