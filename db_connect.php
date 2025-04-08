<!-- this program will connect the page/programs to the database -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect to MCF Database</title>

</head>
<body>
    
<?php
//set up the database
    $server = 'localhost';
    $username = 'phppgm';
    $password = 'mypasswd';
    $database = 'mcf_db';

    //connect the database
    $connect = mysqli_connect($server, $username, $password, $database);

    if(!$connect) {
        die("Cannot connect to $server using $username");//if the database cannot be connected
    }
 ?>
    <!-- Notice that the connection is not closed in this file, it will be closed in other files that use this file -->
</body>
</html>