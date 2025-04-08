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

    <h2>☕ Crafted for Coffee Lovers! &#9749;</h2>
    <h3>Awaken Your Senses with Every Sip!</h3>

    <section class="menu-container">
        <div class="food-container" 
            onclick='openModal("Cappuccino", 
                        "Experience the timeless elegance of a perfectly crafted cappuccino! Made with a bold shot of rich espresso, topped with a silky layer of steamed milk, and finished with a light, airy froth, every sip delivers a harmonious balance of deep coffee flavor and creamy smoothness. Whether enjoyed plain or dusted with cocoa or cinnamon, our cappuccino is the perfect pick-me-up for coffee lovers who crave a velvety, satisfying experience.", 
                        "cappuccino.jpg")'>
             <img src="cappuccino.jpg" alt="Cappuccino">
        </div>
        <div class="food-container" 
            onclick='openModal("Iced Mocha", 
                        "Indulge in the perfect fusion of rich espresso, velvety chocolate, and creamy milk, all poured over ice for a refreshing, indulgent treat. Our Iced Mocha delivers the bold kick of coffee with the sweet, smooth embrace of chocolate, creating a perfectly balanced, energizing drink. Topped with a swirl of whipped cream and a drizzle of chocolate syrup, it’s the ultimate way to cool down and satisfy your coffee and chocolate cravings in one delicious sip!", 
                        "iced_mocha.jpg")'>
             <img src="iced_mocha.jpg" alt="Iced Mocha">
        </div>
        <div class="food-container" 
            onclick='openModal("Hot Mocha", 
                        "Experience the rich harmony of bold espresso and luscious chocolate, blended seamlessly with steamed milk to create a smooth, velvety texture. Our Hot Mocha is the perfect balance of deep coffee flavors and indulgent cocoa, topped with a delicate froth and a drizzle of chocolate syrup for an extra touch of sweetness. Whether you are starting your morning or craving a cozy pick-me-up, this warm and comforting delight is the ultimate treat for coffee and chocolate lovers alike!", 
                        "hot_mocha.jpg")'>
             <img src="hot_mocha.jpg" alt="Hot Mocha">
        </div>
        <div class="food-container" 
            onclick='openModal("Iced Latte", 
                        "Savor the refreshing taste of our Iced Latte, a smooth blend of rich espresso and chilled, creamy milk poured over ice for the perfect balance of boldness and refreshment. With its silky texture and subtly sweet notes, this classic iced coffee is an invigorating way to fuel your day. Customize it with your favorite syrup or enjoy it as is—either way, it’s a cool and satisfying treat for any time of the day!", 
                        "iced_latte.jpg")'>
             <img src="iced_latte.jpg" alt="Iced Latte">
        </div>
        <div class="food-container" 
            onclick='openModal("Hot Latte", 
                        "Indulge in the velvety richness of our Hot Latte, a perfect harmony of bold espresso and steamed milk, topped with a light, silky layer of foam. This timeless favorite offers a smooth, creamy texture with a delicate coffee flavor, making it the ultimate cozy companion for your day. Enjoy it as is or enhance it with a flavored syrup like vanilla, caramel, or hazelnut for an extra touch of sweetness!", 
                        "latte.jpg")'>
             <img src="latte.jpg" alt="Hot Latte">
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

    <h2>Tea & Chocolate – A Sip of Comfort, A Taste of Bliss &#127861;&#127851;</h2>
    <h3>Not into Coffee? That's fine, we got your back!</h3>
    <section class="menu-container">
        <div class="food-container" 
            onclick='openModal("Thai Green Tea", 
                        "Indulge in the vibrant flavors of Thai Green Tea—a perfect blend of rich, aromatic green tea and creamy sweetness. With its signature bright hue and smooth, slightly floral taste, this refreshing drink is served iced or hot, offering a delightful balance of earthy tea notes and velvety milk. Whether you need a midday boost or a moment of relaxation, Thai Green Tea is the perfect sip of comfort.", 
                        "thai_green_tea.jpg")'>
             <img src="thai_green_tea.jpg" alt="Thai Green Tea">
        </div>
        <div class="food-container" 
            onclick='openModal("Thai Red Tea", 
                        "Experience the deep, rich flavors of Thai Red Tea, a perfect fusion of bold black tea, aromatic spices, and creamy sweetness. This beautifully brewed tea boasts a signature amber-red hue, a smooth, full-bodied taste, and a hint of vanilla and star anise for an exotic twist. Served iced or hot, it is the ultimate indulgence—comforting, refreshing, and absolutely irresistible.", 
                        "thai_red_tea.jpg")'>
             <img src="thai_red_tea.jpg" alt="Thai Red Tea">
        </div>
        <div class="food-container" 
            onclick='openModal("Iced Chocolate", 
                        "Refresh and indulge in the ultimate chocolate lover’s dream with our Iced Chocolate! Made with premium cocoa, velvety milk, and just the right touch of sweetness, this smooth and creamy delight is served over ice for a rich, refreshing sip every time. Topped with a swirl of whipped cream or a sprinkle of chocolate shavings, it’s the perfect way to cool down while satisfying your chocolate cravings!", 
                        "iced_chocolate.jpg")'>
             <img src="iced_chocolate.jpg" alt="Iced Chocolate">
        </div>
        <div class="food-container" 
            onclick='openModal("Hot Chocolate", 
                        "Cozy up with the ultimate comfort drink—our rich and creamy Hot Chocolate! Made with premium cocoa and steamed milk, every sip is smooth, velvety, and deeply chocolatey. Topped with fluffy whipped cream, chocolate drizzle, or marshmallows, this warm indulgence is perfect for any moment when you need a little sweetness and warmth in your day!", 
                        "hot_chocolate.jpg")'>
             <img src="hot_chocolate.jpg" alt="Hot Chocolate">
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

    <h2>Cool &amp; Refreshing – The Ultimate Thirst Quenchers &#129380;&#10024;</h2>
    <h3>Stay refreshed, stay energized!</h3>
    <section class="menu-container" id="lastChild">
        <div class="food-container" 
            onclick='openModal("Coca Cola", 
                        "The classic cola experience with a rich, bold flavor and signature fizz that never goes out of style.", 
                        "coke.jpg")'>
             <img src="coke.jpg" alt="Coca Cola">
        </div>
        <div class="food-container" 
            onclick='openModal("Sprite", 
                        "A zesty burst of lemon-lime goodness, delivering ultimate coolness and crisp refreshment in every sip.", 
                        "sprite.jpg")'>
             <img src="sprite.jpg" alt="Sprite">
        </div>
        <div class="food-container" 
            onclick='openModal("Spritzer", 
                        "A light and bubbly refreshment with a crisp, invigorating taste. Perfect for a refreshing pick-me-up!", 
                        "spritzer.jpg")'>
             <img src="spritzer.jpg" alt="Spritzer">
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