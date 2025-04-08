<!-- This program is responsible for managing the users -->

<?php
    //start the session
    session_start();

    //connect the database
    include("db_connect.php");

    // Redirect to login if not logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    //check if the user is a superadmin
    //if not, do not give access
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'superadmin') { ?>
        <h2>You are not authorized for access control.</h2>
    <?php
        exit();
    }

    //if the form was submitted
    if($_SERVER['REQUEST_METHOD']=='POST') {

        //if the information was properly filled out
        if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role'])) {

           //get the data and store it in the corresponding variables
            $username = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'];

            //sql commands to check if the user already exists
            $checkSql = "SELECT user_id FROM Users WHERE username = '$username' AND email = '$email'";
            //execute the query
            $checkResult = mysqli_query($connect, $checkSql);

            //if the user was found, then display error message
            if (mysqli_num_rows($checkResult) > 0) { ?>
                <script>
                    alert("User already exists");
                </script>
          <?php  } 
            //if the User does not exist, insert it into the database
            else {
                //sql to insert, and prepare the statement for security from sql injection
                $sql = "INSERT INTO users (username, email, password, role)
                        VALUES (?, ?, ?, ?)";
                //prepare the sql 
                $stmt = mysqli_prepare($connect, $sql);
                //bind the parameters with the input, "ssss" means 4 strings 
                mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $role);
                        
                //send the appropriate message
                if(mysqli_stmt_execute($stmt)) { ?>
                    <script>
                        alert("User added successfully");
                    </script>
        <?php   } else { ?>
                    <script>
                        alert("Error! User cannot be added.");
                    </script>
    <?php        }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Control</title>

    <style>
            * {
                padding: 0;
                margin: 0;
            }
            .userSpace {
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

            #addUser {
                padding: 10px 20px;
                background-color: blue;
                color: white;
                border: none;
                border-radius: 0.5rem;
            }

        </style>

</head>
<div class="box1">
        <h1>Access Control</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add User</button>
</div>

<div class="userSpace">
        <div class="tableSpace">
        <?php  
        //retrieve the table data
        $sql = "SELECT * FROM Users";
        $result = mysqli_query($connect, $sql);
        //if the table is empty
        if (mysqli_num_rows($result) == 0) {    ?>
            <h3>Table is empty!</h3>
<?php    }
        else { ?>
            <!-- Display the database in a table -->
            <table border="1">
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php
                    //if data were found, fetch it and display it in the table format
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['role'] . "</td>";?>
                            <td><a href="update.php?id=<?=$row['user_id'];?>&type=user" class="btn btn-success">Update</a></td>
                            <td><a href="delete.php?id=<?=$row['user_id'];?>&type=user" class="btn btn-danger">Delete</a></td>
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
        <h5 class="modal-title">Add User</h5>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
          <label>Username:</label>
          <input type="text" name="username" required><br>

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required><br>

          <label>Password:</label>
          <input type="password" name="password" required><br>

          <label for="role">Role:</label>
          <select name="role" id="role">
            <option value="superadmin">Superadmin</option>
            <option value="admin">Admin</option>
          </select><br>

          <button type="submit" id="addUser">Add User</button>

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