<!--  This program purpose is to update the database  -->

<?php

//include the database
include("db_connect.php");

//ensure the id and type are set
if(!isset($_GET['id']) || !isset($_GET['type'])) {
    die("Invalid Request");
}

//store the values in the variables
$id = intval($_GET["id"]);
$type = $_GET["type"];

//determine which table is being referred to, and target the table with its column
if($type == "product") {
    $table = "product";
    $id_column = "product_id";
    $sql = "SELECT * FROM Product WHERE product_id = $id";
}
else if($type == "user") {
    $table = "Users";
    $id_column = "user_id";
    $sql = "SELECT * FROM Users WHERE user_id = $id";
}
else {
    die("Invalid Type");
}

//execute the sql and
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

//if the record was not found
if(!$row) {
    die("Record was not found.");
}

//if it was found, get the new data 
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //if it was a product
    if($type == "product") {
        //get the data and store it in the corresponding variables
        $product_name = htmlspecialchars($_POST["product_name"]);
        $category = $_POST['category'];
        $price = $_POST['price'];
        $stock_quantity = $_POST['stock_quantity'];

        //the sql to update the data 
        $updateSql = "UPDATE product SET 
        product_name='$product_name', category='$category', 
        price='$price', stock_quantity='$stock_quantity', 
        updated_at=NOW() WHERE product_id=$id";

        //execute the sql
        if(mysqli_query($connect, $updateSql)) {
            //redirect if successful
            header("Location: product.php");
            exit();
            }
        }
    else if($type == "user") {
        //get the data and store it in the corresponding variables
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = $_POST['role'];
    
        //the sql to update the data 
        $updateSql = "UPDATE users SET 
        username='$username', email='$email', 
        password='$password', role='$role'
        WHERE user_id=$id";

        //execute the sql
            if(mysqli_query($connect, $updateSql)) {
                //redirect if successful
                header("Location: users.php");
                exit();
                }
            }
    else {  ?>
        <script>
            alert("Error, could not update data!");
        </script>
<?php }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            padding: 0;
            margin: 0;
        }
        .updateForm {
            height: 100vh;
            width: 100vw;
            text-align: center;
            font-family: arial;
            font-weight: bold;
            background-color: beige;
        }
        .updateForm h2 {
            background-color: rgb(38, 22, 21);
            color: white;
        }
        .updateForm h2, label {
            padding: 20px;
        }
        .updateForm input {
            margin-top: auto;
        }
        button {
            padding: 10px 30px;
            background-color: green;
            color: white;
            cursor: pointer;
            border: 1px solid white;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
    
<form method="POST" class="updateForm">
        <?php if ($type == "product") { ?>
            <h2>Update Product</h2><br><br>
            <label>Product Name:</label>
            <input type="text" name="product_name" value="<?= $row['product_name'] ?>" required><br><br>

            <label>Category:</label>
            <select name="category">
                <option value="Drink" <?= ($row['category'] == 'Drink') ? 'selected' : ''; ?>>Drink</option>
                <option value="Food" <?= ($row['category'] == 'Food') ? 'selected' : ''; ?>>Food</option>
                <option value="Merchandise" <?= ($row['category'] == 'Merchandise') ? 'selected' : ''; ?>>Merchandise</option>
            </select><br><br>

            <label>Price:</label>
            <input type="number" step="0.01" name="price" value="<?= $row['price'] ?>" required><br><br>

            <label>Stock Quantity:</label>
            <input type="number" name="stock_quantity" value="<?= $row['stock_quantity'] ?>" required><br><br>

            <button type="submit">Update</button>
        <?php } 
            else if($type == "user") {  ?>
            <h2>Update User</h2><br><br>
            <label>Userame:</label>
            <input type="text" name="username" value="<?= $row['username'] ?>" required><br><br>

            <label>Email:</label>
            <input type="email" name="email" value="<?= $row['email'] ?>" required><br><br>

            <label>Password:</label>
            <input type="password" name="password" value="<?= $row['password'] ?>" required><br><br>

            <select name="role">
                <option value="superadmin" <?= ($row['role'] == 'superadmin') ? 'selected' : ''; ?>>Superadmin</option>
                <option value="admin" <?= ($row['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
            </select><br><br>

            <button type="submit">Update</button>
    <?php } ?>

</body>
</html>