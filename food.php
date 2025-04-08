<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menu - Food</title>

        <style>
            * {
                padding: 0;
                margin: 0;
                font-family: arial;
                font-weight: bold;
            }

            .menu-container {
                display: flex;
                justify-content: center;
                gap: 20px;
                margin-top: 20px;
                align-items: center;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: rgb(185, 116, 116);
                
            }
            .food-container {
                cursor: pointer;
                text-align: center;
            }
            .food-container img {
                width: 200px;
                height: 200px;
                object-fit: cover;
                border-radius: 0.5rem;
                transition: 0.5s;
            }
            .food-container:hover img {
                transform: scale(1.1);
            }

            .modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
            }
            .modal-content {
                background-color: white;
                margin: 10% auto;
                padding: 20px;
                max-height: 80vh;
                overflow-y: auto;
                width: 50%;
                border-radius: 0.5rem;
                position: relative;
                text-align: center;
            }
            .modal-content img {
                width: 200px;
                height: auto;
                margin-bottom: 10px;
            }
            .close {
                position: absolute;
                top: 10px;
                right: 20px;
                font-size: 24px;
                cursor: pointer;
            }
            h2, h3 {
                padding: 10px;
                margin-bottom: 10px;
            }
            #lastChild {
                margin-bottom: 50px;
            }
        </style>
    </head>
<body>
    <?php  include("navigationBar.php"); ?>

    <h2>Freshly Baked just for you! &#129366;&#129360;</h2>
    <h3>Freshly Baked, Just for You! Every bite is a delight</h3>

    <section class="menu-container">
        <div class="food-container" 
            onclick='openModal("Croissant", 
                        "Indulge in the perfect blend of buttery richness and delicate flakiness with our freshly baked croissants! Crafted with premium ingredients and expertly layered for a light, airy texture, our croissants offer a golden, crisp exterior and a soft, melt-in-your-mouth center. Whether you enjoy them plain or filled with delicious flavors like chocolate or almond, they pair perfectly with your morning coffee or as an anytime treat. Experience the taste of pure delight.", 
                        "croissant.png")'>
             <img src="croissant.png" alt="Croissant">
        </div>
        <div class="food-container" 
            onclick='openModal("Classic Cookies", 
                        "Savor the comforting taste of our freshly baked classic cookies! With a perfectly golden, crisp edge and a soft, chewy center, each bite is filled with rich, buttery goodness. Made with premium ingredients and baked to perfection, our cookies come in a variety of irresistible flavors, from classic chocolate chip to indulgent double chocolate and nutty delights. Whether paired with a cup of coffee or enjoyed as a sweet snack, our cookies are the perfect treat to satisfy your cravings. Taste the nostalgia, one bite at a time!", 
                        "classic_cookies.png")'>
             <img src="classic_cookies.png" alt="Classic Cookies">
        </div>
        <div class="food-container" 
            onclick='openModal("Pistachio Donut", 
                        "Elevate your treat time with our irresistible Pistachio Donut! Soft, fluffy, and glazed to perfection, this delightful donut is infused with the rich, nutty essence of premium pistachios. Topped with a luscious pistachio glaze and a sprinkle of crunchy chopped pistachios, every bite offers the perfect balance of sweetness and texture. Whether you are a nut lover or just craving something unique, this donut is a must-try indulgence. Treat yourself to a bite of pure pistachio bliss!", 
                        "pistachio_donut.png")'>
             <img src="pistachio_donut.png" alt="Pistachio Donut">
        </div>
        <div class="food-container" 
            onclick='openModal("Powdered Sugar Donut", 
                        "Take a bite into pure nostalgia with our dreamy Powdered Sugar Donut—light as air, irresistibly soft, and dusted with a snowy coat of fine powdered sugar. Every bite delivers the perfect balance of pillowy fluff and melt-in-your-mouth sweetness, making it an instant classic. Whether you are treating yourself in the morning or craving a midday delight, this donut is a little taste of happiness in every bite.", 
                        "powdered_donut.png")'>
             <img src="powdered_donut.png" alt="Powdered Sugar Donut">
        </div>

        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <img id="modal-img" src="" alt="">
                <h2 id="modal-title"></h2>
                <p id="modal-description"></p>
            </div>
        </div>
    </section>

    <h2>Sweet Indulgence Awaits! 🍰🍮</h2>
    <h3>Treat yourself to heavenly desserts you won’t want to miss!</h3>
    <section class="menu-container">
        <div class="food-container" 
            onclick='openModal("Chocolate Mousse Delight", 
                        " A dreamy, melt-in-your-mouth experience! Indulge in the perfect harmony of rich, velvety chocolate mousse layered with smooth vanilla cream, resting on a delicate sponge base. Topped with chocolate shavings and fresh blueberries for a hint of freshness, this decadent treat is pure bliss in every bite. Perfect for dessert lovers who crave elegance and flavor in every slice!", 
                        "cake_1.webp")'>
             <img src="cake_1.webp" alt="Chocolate Mousse Delight">
        </div>
        <div class="food-container" 
            onclick='openModal("The Chocolate Nuke", 
                        "Brace yourself for an explosion of rich, velvety chocolate! The Chocolate Nuke is a triple-layered masterpiece, packed with deep, fudgy goodness, silky chocolate mousse, and an intense dark chocolate ganache that melts in your mouth. Topped with luxurious chocolate shavings and a hint of mint, this dessert is not just a treat—it’s a full-blown flavor detonation!", 
                        "cake_2.jpg")'>
             <img src="cake_2.jpg" alt="The Chocolate Nuke">
        </div>
        <div class="food-container" 
            onclick='openModal("Matcha Bliss", 
                        "Experience the perfect harmony of earthy matcha and delicate sweetness with our Matcha Bliss Cake! This beautifully layered green tea delight features fluffy sponge cake infused with premium matcha, paired with a smooth, creamy matcha frosting for a bold yet balanced flavor. Every bite is a refreshing blend of rich, aromatic green tea and subtle sweetness—perfect for matcha lovers and dessert enthusiasts alike! ", 
                        "cake_3.jpg")'>
             <img src="cake_3.jpg" alt="Matcha Bliss">
        </div>

        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <img id="modal-img" src="" alt="">
                <h2 id="modal-title"></h2>
                <p id="modal-description"></p>
            </div>
        </div>
    </section>

    <h2>Hearty Feasts to be devoured! &#127858;</h2>
    <h3>Satisfy Your Cravings with Our Hearty Favorites!</h3>
    <section class="menu-container">
        <div class="food-container" 
            onclick='openModal("Classic Lasagna", 
                        " Dive into a rich and hearty experience with our homemade lasagna, crafted with layers of tender pasta, slow-cooked savory meat sauce, creamy béchamel, and a generous blend of melted cheeses. Each bite is packed with comforting flavors, making it the perfect dish for satisfying your cravings. Whether you are dining solo or sharing with loved ones, this classic Italian favorite promises warmth, indulgence, and pure satisfaction.", 
                        "lasagna.jpg")'>
             <img src="lasagna.jpg" alt="Classic Lasagna">
        </div>
        <div class="food-container" 
            onclick='openModal("Classic Mac & Cheese", 
                        "Indulge in the perfect comfort food—our rich and velvety Mac & Cheese! Made with perfectly cooked pasta, smothered in a creamy, gooey blend of premium cheeses, and baked to golden perfection, every bite is pure, cheesy bliss. Whether you love it classic or with a twist like crispy bacon or spicy jalapeños, this dish is the definition of comfort in a bowl.", 
                        "macNcheese.jpg")'>
             <img src="macNcheese.jpg" alt="Classic Mac & Cheese">
        </div>

        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <img id="modal-img" src="" alt="">
                <h2 id="modal-title"></h2>
                <p id="modal-description"></p>
            </div>
        </div>
    </section>

    <h2>&#129386; Savor the Perfect Bite! &#129386;</h2>
    <h3>Made Fresh. Packed with Flavor. Just for You!</h3>
    <section class="menu-container" id="lastChild">
        <div class="food-container" 
            onclick='openModal("Beef Ham and Cheese Bagel", 
                        "Savor the perfect combination of tender beef ham, melted cheese, and a toasted bagel for the ultimate savory bite. Every bite is a delicious harmony of smoky, cheesy goodness wrapped in a warm, golden-brown bagel. Perfect for breakfast, lunch, or a quick snack!", 
                        "bagel.jpg")'>
             <img src="bagel.jpg" alt="Beef Ham and Cheese Bagel">
        </div>
        <div class="food-container" 
            onclick='openModal("Classic Tuna Sandwich", 
                        "Enjoy the perfect blend of creamy tuna salad, crisp lettuce, and soft, freshly baked bread. Every bite is packed with wholesome goodness, making it the ultimate go-to meal for a light yet satisfying treat. A timeless classic that never goes out of style!", 
                        "classic_tuna.jpg")'>
             <img src="classic_tuna.jpg" alt="Classic Tuna Sandwich">
        </div>
        <div class="food-container" 
            onclick='openModal("The Jumbo Sandwich", 
                        "Why settle for one when you can have it all? Our Jumbo Sandwich is a powerhouse of flavors, packed with tender chicken ham, crispy beef bacon, a perfectly cooked egg, fresh lettuce, and juicy tomato—all layered between soft, toasted bread. It’s a mouthwatering, satisfying bite in every layer!", 
                        "jumbo_sandwich.jpg")'>
             <img src="jumbo_sandwich.jpg" alt="The Jumbo Sandwich">
        </div>

        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <img id="modal-img" src="" alt="">
                <h2 id="modal-title"></h2>
                <p id="modal-description"></p>
            </div>
        </div>
    </section>

<script>
    function openModal(title, description, image) {
        document.getElementById("modal-title").innerText = title;
        document.getElementById("modal-description").innerText = description;
        document.getElementById("modal-img").src = image;

        document.getElementById("modal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("modal").style.display = "none";
    }

    window.onclick = function(event) {
        let modal = document.getElementById("modal");
        if(event.target === modal) {
            closeModal();
        }
    };
</script>

<?php include("footer.php"); ?>

</body>
</html>