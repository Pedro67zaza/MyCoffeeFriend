<!-- this program will handle the products. It will take in values, 
 and display it in the table-->
 <?php

    //start the session
    session_start();

    //include the file that connect the page to the database
    include("db_connect.php");

    //if the form was submitted
    if($_SERVER['REQUEST_METHOD']=='POST') {

        if(isset($_POST['add'])) {

            if(isset($_POST['product_name']) && isset($_POST['category']) && isset($_POST['price']) && isset($_POST['stock_quantity'])) {

                //get the input and store it in the variables
                $product_name = htmlspecialchars($_POST['product_name']);
                $category = $_POST['category'];
                $price = $_POST['price'];
                $stock_quantity = $_POST['stock_quantity'];
    
                //sql commands to check if the product already exists
                $checkSql = "SELECT product_id FROM Product WHERE product_name = '$product_name' AND category = '$category'";
                //execute the query
                $checkResult = mysqli_query($connect, $checkSql);
    
                //if the product was found, then display error message
                if (mysqli_num_rows($checkResult) > 0) { ?>
                    <script>
                        alert("Product already exists");
                    </script>
              <?php  } 
                //if the product does not exist, insert it into the database
                else {
                    $sql = "INSERT INTO Product (product_name, category, price, stock_quantity)
                            VALUES ('$product_name', '$category', '$price', '$stock_quantity')";
                            
                    //send the appropriate message
                    if(mysqli_query($connect, $sql)) { ?>
                        <script>
                            alert("Product added successfully");
                        </script>
            <?php   } else { ?>
                        <script>
                            alert("Cannot add product");
                        </script>
        <?php        }
                }
            }
         }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Management</title>

        <style>
            * {
                padding: 0;
                margin: 0;
            }
            .productSpace {
                height: 100vh;
                width: 100%;
                gap: 30px;
                padding: 30px 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 30px;
                justify-content: center;
                background-color: white;
            }

            html, body {
                height: 100%;
                width: 100%;
            }

            form {
                display: flex;
                flex-direction: column;
                align-items: center; 
            }

            .tableSpace {
                max-height: 500px;
                width: 90%;
                background-color: white;
                padding: 20px;
                border-radius: 30px;
                text-align: center;
                box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2);
                overflow: auto;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }
            th {
                background-color: rgb(38, 22, 21);
                color: white;
            }
            th, td {
                padding: 10px;
                text-align: center;
            }
            td {
                background-color: white;
            }

            .box1 {
                position: relative;
                padding: 20px;
                font-family: arial;
                font-weight: bold;
                background-color: #261615;;
                display: flex;
                height: auto;
                width: 100vw;
            }

            .box1 h1 {
                float: left;
                color: white;
            }
            .box1 button {
                position: absolute;
                right: 30px;
                padding: 10px 20px;
                background-color: blue;
                color: white;
                border: none;
                border-radius: 0.5rem;
                cursor: pointer;
            }

            #addProduct {
                padding: 10px 20px;
                background-color: blue;
                color: white;
                border: none;
                border-radius: 0.5rem;
            }

            .searchBar {
                height: auto;
                width: 50px;
                display: flex;
            }
            .searchBar input {
                margin: 10px;
            }
            #searchBtn {
                padding: 10px 20px;
                background-color: green;
                color: white;
                border: none;
                border-radius: 0.5rem;
            }

        </style>
    </head>
<body>

<div class="box1">
        <h1>Product Management</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button>
</div>

<div class="productSpace">
        <div class="tableSpace">
        <?php  
        //retrieve the table data
        $sql = "SELECT * FROM Product";
        $result = mysqli_query($connect, $sql);
        //if the table is empty
        if (mysqli_num_rows($result) == 0) {    ?>
            <h3>Table is empty!</h3>
<?php    }
        else { ?>
            <!-- Display the database in a table -->
            <table border="1">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price(RM)</th>
                    <th>Quantity</th>
                    <th>Created at</th>
                    <th>Last Updated</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php
                    //if data were found, fetch it and display it in the table format
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['product_id'] . "</td>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td>" . $row['category'] . "</td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['stock_quantity'] . "</td>";
                            echo "<td>" . $row['created_at'] . "</td>";
                            echo "<td>" . $row['updated_at'] . "</td>"; ?>
                            <td><a href="update.php?id=<?=$row['product_id'];?>&type=product" class="btn btn-success">Update</a></td>
                            <td><a href="delete.php?id=<?=$row['product_id'];?>&type=product" class="btn btn-danger">Delete</a></td>
                        <?php
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
            <?php  } ?>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Product</h5>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
          <label>Product Name:</label>
          <input type="text" name="product_name" required><br>
          <label for="category">Category:</label>
          <select name="category" id="category">
            <option value="Drink">Drink</option>
            <option value="Food">Food</option>
            <option value="Merchandise">Merchandise</option>
          </select><br>
          <label>Price:</label>
          <input type="number" step="0.01" name="price" required><br>
          <label>Stock Quantity:</label>
          <input type="number" name="stock_quantity" required><br>
          <button type="submit" name="add" id="addProduct">Add Product</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- Close the connection -->
<?php mysqli_close($connect);?>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>