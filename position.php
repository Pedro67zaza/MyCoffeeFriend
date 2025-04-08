<?php
    include("navigationBar.php");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Position - Job Available</title>

        <style>
            * {
                padding: 0;
                margin: 0;
            }
            .job-container {
                display: flex;
                height: auto;
                max-width: 1100px;
                margin: 40px auto;
                padding: 20px;
                gap: 20px;
                border: 2px solid white;
                border-radius: 0.5rem;
                background-color: white;
            }
            .job-container img {
                height: 100%;
                width: 30%;
                object-fit: cover;
            }
            .job-container a {
                text-decoration: none;
                padding: 10px;
                background-color: green;
                color: white;
            }

        </style>
    </head>
<body>
    <section class="job-container">
        <img src="barista_position.jpg" alt="Barista Position - looking to hire">
        <div class="job-details">
            <h2>Barista</h2>
            <p>A barista is responsible for preparing and serving a variety of coffee and tea beverages 
                while providing excellent customer service. They maintain a clean and organized workspace, 
                operate coffee machines, and ensure that customers have a pleasant café experience.
            </p>
            <h4>Requirements:</h4>
            <p>
                <ul style="list-style-type:circle">
                    <li>Prior experience as a barista or in a customer service role is a plus</li>
                    <li>Strong communication and interpersonal skills</li>
                    <li>Ability to work in a fast-paced environment</li>
                    <li>Basic knowledge of coffee preparation and equipment</li>
                    <li>Flexibility to work shifts, including weekends and holiday</li>
                </ul>
            </p>
            <a href="jobApply.php">Apply Now</a>
        </div>
    </section>
    <section class="job-container">
        <img src="manager_position.jpg" alt="Manager Position - looking to hire">
        <div class="job-details">
            <h2>Manager</h2>
            <p>A café manager oversees daily operations, ensures high customer satisfaction, 
                and manages staff to maintain smooth workflow. They handle inventory, budgeting, 
                and ensure the café meets health and safety standards.
            </p>
            <h4>Requirements:</h4>
            <p>
                <ul style="list-style-type:circle">
                    <li>Experience in food service management or a similar role</li>
                    <li>Strong leadership and organizational skills</li>
                    <li>Knowledge of financial management and budgeting</li>
                    <li>Ability to work under pressure and problem-solve efficiently</li>
                    <li>Familiarity with coffee and food preparation standards</li>
                </ul>
            </p>
            <a href="jobApply.php">Apply Now</a>
        </div>
    </section>
    <section class="job-container">
        <img src="pastry_position.jpg" alt="Pastry Position - looking to hire">
        <div class="job-details">
            <h2>Pastry Chef</h2>
            <p>A pastry chef or baker is responsible for preparing baked goods, 
                pastries, and desserts served in the café. They create recipes, 
                manage ingredient inventory, and ensure quality in all baked products.
            </p>
            <h4>Requirements:</h4>
            <p>
                <ul style="list-style-type:circle">
                    <li>Experience in baking or pastry preparation</li>
                    <li>Strong knowledge of baking techniques and ingredient combinations</li>
                    <li>Creativity in developing new recipes</li>
                    <li>Attention to detail and ability to work early morning shifts</li>
                    <li>Culinary training or certification is a plus</li>
                </ul>
            </p>
            <a href="jobApply.php">Apply Now</a>
        </div>
    </section>

    <?php  include("footer.php"); ?>
</body>
</html>