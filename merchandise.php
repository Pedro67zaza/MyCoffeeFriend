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

    <h2>Headwear &#129506;</h2>
    <h3>Top Off Your Style – Wear the Vibe!</h3>

    <section class="menu-container">
        <div class="food-container" 
            onclick='openModal("Cap - Green", 
                        "", 
                        "green_cap.jpg")'>
             <img src="green_cap.jpg" alt="Green Cap">
        </div>
        <div class="food-container" 
            onclick='openModal("Cap - Black", 
                        "", 
                        "black_cap.jpg")'>
             <img src="black_cap.jpg" alt="Black Cap">
        </div>
        <div class="food-container" 
            onclick='openModal("Bucket Hat - Yellow", 
                        "", 
                        "cap_3.jpg")'>
             <img src="cap_3.jpg" alt="Yellow Bucket Hat">
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

    <h2>Drinkware &#9749;</h2>
    <h3>Sip in Style &ndash; Stay Refreshed Anywhere!</h3>
    <section class="menu-container">
        <div class="food-container" 
            onclick='openModal("Classic Coffee Cup", 
                        "", 
                        "merchandise_2.jpg")'>
             <img src="merchandise_2.jpg" alt="Classic Coffee Cup">
        </div>
        <div class="food-container" 
            onclick='openModal("Stainless Steel Cup - Beige", 
                        "", 
                        "cup_1.jpg")'>
             <img src="cup_1.jpg" alt="Beige Stainless Steel Cup">
        </div>
        <div class="food-container" 
            onclick='openModal("Classic Cup - Brown", 
                        "", 
                        "cup_2.jpg")'>
             <img src="cup_2.jpg" alt="Classic Brown Cup">
        </div>
        <div class="food-container" 
            onclick='openModal("Tumbler Cup", 
                        "", 
                        "cup_3.jpg")'>
             <img src="cup_3.jpg" alt="Tumbler Cup">
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

    <h2>Cuddly Companions Await! &#129528;</h2>
    <h3>Snuggle Up with Our Soft & Adorable Plushies!</h3>
    <section class="menu-container" id="lastChild">
        <div class="food-container" 
            onclick='openModal("Theo", 
                        "Soft, cuddly, and always ready for a hug—this plush companion is the perfect snuggle buddy. With a classic design and a charming bow, it brings warmth and comfort to every moment. Whether as a gift or a cozy keepsake, this teddy is made to be cherished forever.", 
                        "plushies_1.jpg")'>
             <img src="plushies_1.jpg" alt="Theo - The White Teddy Bear">
        </div>
        <div class="food-container"
            onclick='openModal("Lucio", 
                        "This plush gingerbread friend is as sweet as it looks! With a soft, huggable design, adorable icing details, and a charming bow, it’s the perfect cozy companion. Whether for festive decor or everyday cuddles, this delightful plush is sure to bring warmth and joy.", 
                        "plushies_2.jpg")'>
             <img src="plushies_2.jpg" alt="Lucio - The Gingerbread Cookie">
        </div>
        <div class="food-container" 
            onclick='openModal("Marko", 
                        "This plush shark is the ultimate snuggle buddy! With its soft, velvety texture and lifelike details, it is both fierce and friendly. Perfect for ocean lovers of all ages, this cuddly companion brings a splash of adventure to any collection.", 
                        "plushies_3.jpg")'>
             <img src="plushies_3.jpg" alt="Marko - The Small Shark">
        

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