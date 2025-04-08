<?php
    include("navigationBar.php");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page - My Coffee Friend</title>
        <style>
           * {
            padding: 0;
            margin: 0;
           }
           .container {
            padding: 16px;
           }
           .slider {
            position: relative;
            max-width: 48rem;
            margin: 0 auto;
           }
           .slider-image {
            display: flex;
            aspect-ratio: 16/9;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            box-shadow: 0 1.5rem 3rem -0.75rem hsla(0, 0%, 0%, 0.25);
            border-radius: 0.5rem;
            overflow: hidden;
           }
           .slider-image img {
            flex: 1 0 100%;
            scroll-snap-align: start;
            object-fit: cover;
           }
           .slider-nav {
            display: flex;
            column-gap: 1rem;
            position: absolute;
            bottom: 1.25rem;
            left: 50%;
            transform: translate(-50%);
            z-index: 1;
           }
           .slider-nav a {
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 50%;
            background-color: #fff;
            opacity: 0.75;
            transition: opacity ease 250ms;
           }

           .slider-nav a.active {
            opacity: 1;
           }

           .slider-nav a:hover {
            opacity: 100%;
           }
           button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: hsla(0, 0%, 0%, 0.5);
            color: white;
            padding: 10px;
            cursor: pointer;
           }
           #prevBtn {left: 10px;}
           #nextBtn {right: 10px;}

           img.displaySlide {
            display: block;
           }

           .announcement {
            position: relative;
           }
           .announcement h3 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: large;
            text-decoration: none;
            margin: 15px 10px;
           }
           .announcement a {
            position: absolute;
            color: white;
            font-weight: bold;
            font-family: arial;
            background-color: crimson;
            padding: 15px 40px;
            border-radius: 0.5rem;
            top: 10px;
            right: 20px;
           }
           .cards {
            font-family: arial;
            color: white;
            font-weight: bold;
            display: flex;
            gap: 10px;
            justify-content: space-evenly;
            margin: 40px;
            height: 30%;
            max-width: auto;
           }
           .cards-content {
            position: relative;
            display: block;
            object-fit: cover;
            min-height: auto;
            min-width: 20%;
            border-radius: 0.5rem;
           }
           .cards-content h2 {
            position: absolute;
            font-size: medium;
            padding: 10px 30px;
            border-radius: 0.5rem;
            background-color: rgba(220, 20, 60, 0.5);
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
           }
           .cards-content a {
            position: relative;
            top: 60%;
            left: 25%;
            padding: 10px;
            border-radius: 0.5rem;
            color: white;
            background-color: navy;
           }
           .loginOption {
                position: relative;
                display: flex;
                justify-content: space-between;
                background-color: rgb(38, 22, 21);
                padding: 20px;
                height: 15rem;
                width: auto;
                font-family: Arial, Helvetica, sans-serif;
                font-weight: bold;
                color: white;
           }
           .loginOption h1, h3 {
            margin: 10px;
           }
           .loginOption a {
            position: absolute;
            top: 150px;
            left: 30px;
            padding: 20px 10px;
            color: white;
            border: 2px solid white;
            border-radius: 0.5rem;
            background-color: rgb(38, 22, 21);
           }
           .loginOption a:hover {
            color: rgb(255, 215, 0);
           }
           
        </style>
    </head>
<body>
    <section class="container">
        <div class="slider">
            <div class="slider-image">
                <img id="slide-1" src="palestine_message.png" alt="Palestine Support Message">
                <img id="slide-2" src="Ramadan_Mubarak.png" alt="Ramadan Celebration">
                <img id="slide-3" src="ramadan_promotion.png" alt="Ramadan Promotion">
            </div>
            <div class="slider-nav">
                <a href="slide-1"></a>
                <a href="slide-2"></a>
                <a href="slide-3"></a>
            </div>
            <button id="prevBtn">&#10094;</button>
            <button id="nextBtn">&#10095;</button>
        </div>
    </section>
    <section class="announcement">
           <h3>Opportunity and Announcement!<br>
           You do not want to miss! &#x1F929;</h3>
           <a href="announcement_1.php">See the announcement here</a>
    </section>
    <section class="cards">
           <div class="cards-content" style="background-image: url('FNB.jpg');">
                <h2>Food</h2>
                <a href="food.php">Explore more</a>
           </div>
           <div class="cards-content" style="background-image: url('merchandise_2.jpg');">
                <h2>Merchandise</h2>
                <a href="merchandise.php">Explore more</a>
           </div>
           <div class="cards-content" style="background-image: url('career.jpg');">
                <h2>Career</h2>
                <a href="workingAtMCF.php">Explore more</a>
           </div>
           <div class="cards-content" style="background-image: url('history.jpg');">
                <h2>Our history</h2>
                <a href="ourCompany.php">Explore more</a>
           </div>
    </section>
    <section class="loginOption">
           <div>
                <h1>An offer you can't refuse &#128064;</h1>
                <h3>We are looking to expand our manpower!</h3>
                <a href="position.php">I am interested</a>
           </div>
           <img src="logo.png" alt="">
    </section>
<?php
    include("footer.php");
?>
</body>
</html>

<script>
    const slidesContainer = document.querySelector(".slider-image");
    const slides = document.querySelectorAll(".slider-image img");
    const dots = document.querySelectorAll(".slider-nav a");
    let slideIndex = 0;
    let slideWidth = slides[0].clientWidth;

    document.addEventListener("DOMContentLoaded", initializeSlider)
    
    function initializeSlider() {
        if(slides.length > 0) {
            setInterval(nextSlide, 4000);
            updateDots();
        }

        dots.forEach((dot, index) => {
            dot.addEventListener("click", function (event) {
                event.preventDefault();
                slideIndex = index;
                showSlide();
            });
        });
    }
    function showSlide() {
        slidesContainer.scrollTo({
            left: slideIndex * slideWidth,
            behavior: "smooth"
        });
        updateDots();
    }
    function prevSlide() {
        slideIndex = (slideIndex - 1 + slides.length) % slides.length;
        showSlide();
    }
    function nextSlide() {
        slideIndex = (slideIndex + 1) % slides.length;
        showSlide();
    }
    function updateDots() {
        dots.forEach((dot, index) => {
            dot.style.opacity = index === slideIndex ? "1" : "0.5";
        });
    }

    document.getElementById("prevBtn").addEventListener("click", prevSlide);
    document.getElementById("nextBtn").addEventListener("click", nextSlide);
</script>