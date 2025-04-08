<!--  This program will delete the specified data  -->

<?php
//include the database
include("db_connect.php");

//ensure the id and type are set
if(!isset($_GET['id']) || !isset($_GET['type'])) {
    die("Invalid Request");
}

//get the values
$id = intval($_GET["id"]);
$type = $_GET["type"];

//determine which table is being referred to
if($type == "product") {
    $table = "product";
    $id_column = "product_id";
    $sql = "DELETE FROM Product WHERE product_id = $id";
    $redirect = "product.php";
}
else if($type == "jobApplication") {
    $table = "job_resume";
    $id_column = "resume_id";
    $sql = "DELETE FROM job_resume WHERE resume_id = $id";
    $redirect = "application.php";
}
else if($type == "feedback") {
    $table = "feedback";
    $id_column = "feedback_id";
    $sql = "DELETE FROM feedback WHERE feedback_id = $id";
    $redirect = "feedback.php";
}
else if($type == "user") {
    $table = "users";
    $id_column = "user_id";
    $sql = "DELETE FROM users WHERE user_id = $id";
    $redirect = "users.php";
}
else {
    die("Invalid Type");
}

//execute the sql command
if($type == "product") { 
    if(mysqli_query($connect, $sql)) {  ?>
        <script>
            alert("<?php echo ucfirst($type); ?> deleted successfully");
            window.location.href = "<?php echo $redirect; ?>";
        </script>
    <?php
        header("Location: product.php");
        exit();
    }
}
else if($type == "jobApplication") { 
    if(mysqli_query($connect, $sql)) {  ?>
        <script>
            alert("<?php echo ucfirst($type); ?> deleted successfully");
            window.location.href = "<?php echo $redirect; ?>";
        </script>
    <?php
        header("Location: application.php");
        exit();
    }
}
else if($type == "feedback") { 
    if(mysqli_query($connect, $sql)) {  ?>
        <script>
             alert("<?php echo ucfirst($type); ?> deleted successfully");
             window.location.href = "<?php echo $redirect; ?>";
        </script>
    <?php
        header("Location: feedback.php");
        exit();
    }
}
 else if($type == "user") { 
    if(mysqli_query($connect, $sql)) {  ?>
        <script>
             alert("<?php echo ucfirst($type); ?> deleted successfully");
             window.location.href = "<?php echo $redirect; ?>";
        </script>
    <?php
        header("Location: users.php");
        exit();
    }
}
else {  ?>
    
    <script>
        alert("Error! Cannot delete <?php echo ucfirst($type); ?>.");
    </script>
<?php } ?>
