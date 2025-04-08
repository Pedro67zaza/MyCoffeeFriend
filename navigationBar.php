<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" width="device-width, initial-scale=1.0">
        <title>Navigation Bar</title>
        <style>
            * {
                text-decoration: none;
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }
            body {
                background-color: beige;
            }
            .navBar {
                background-color: rgb(38, 22, 21);
                font-family: arial;
                font-weight: bold;
                padding: 15px;
            }
            .navdiv {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            .logo img {
                max-height: 80px;
                width: auto;
            }
            ul {
                display: flex;
                list-style: none;
            }
            li{
                position: relative;
                padding: 10px 15px;
            }
            li a {
                color: white;
                display: block;
            }
            .dropdown-content {
                display: block;
                opacity: 0;
                transform: translateY(-10px);
                pointer-events: none;
                transition: opacity 0.3s ease, transform 0.3s ease;

                position: absolute;
                z-index: 20;
                top: 100%;
                left: 0;
                background-color: rgb(38, 22, 21);
                padding: 5px 0;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
                overflow: hidden;
            }
            .dropdown-content li {
                display: block;
                padding: 10px;
                white-space: nowrap;
            }
            
            .dropdown-content li:hover{
                background-color: beige;
                
            }
            .dropdown-content li:hover a {
                color: black;
            }
            .dropdown:hover .dropdown-content {
                opacity: 1;
                transform: translateY(0);
                pointer-events: auto;
            }
        </style>
    </head>
<body>
    <nav class="navBar">
        <div class="navdiv">
            <div class="logo">
                <a href="home.php"><img src="logo.png" alt="My Coffee Friend logo"></a>
            </div>
            <ul>
                <li class="dropdown">
                    <a href="drink.php">MENU</a>
                    <ul class="dropdown-content">
                        <li><a href="drink.php">DRINKS</a></li>
                        <li><a href="food.php">FOODS</a></li>                     
                        <li><a href="merchandise.php">MERCHANDISE</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="workingAtMCF.php">CAREER</a>
                    <ul class="dropdown-content">
                        <li><a href="workingAtMCF.php">WORKING AT MY COFFEE FRIEND</a></li>
                        <li><a href="position.php">POSITION</a></li>
                    </ul>

                </li>
                <li><a href="location.php">LOCATION</a></li>
                <li class="dropdown">
                    <a href="ourCompany.php">ABOUT US</a>
                    <ul class="dropdown-content">
                        <li><a href="ourCompany.php">OUR COMPANY</a></li>
                        <li><a href="contactUs.php">CONTACT US</a></li>
                    </ul>
                </li>
                <li><a href="login.php">LOGIN</a></li>
            </ul>
        </div>
    </nav>
</body>
</html>