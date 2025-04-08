<!-- This is a search bar -->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Advanced Search</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>" class="form-control" placeholder="Enter keyword">
                                        <select name="type" class="form-select">
                                            <option value="product" <?= (isset($_GET['type']) && $_GET['type'] == 'product') ? 'selected' : ''; ?>>Product</option>
                                            <option value="job_resume" <?= (isset($_GET['type']) && $_GET['type'] == 'job_resume') ? 'selected' : ''; ?>>Job Application</option>
                                            <option value="feedback" <?= (isset($_GET['type']) && $_GET['type'] == 'feedback') ? 'selected' : ''; ?>>Feedback & Queries</option>
                                            <option value="users" <?= (isset($_GET['type']) && $_GET['type'] == 'users') ? 'selected' : ''; ?>>User</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Results Section -->
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <?php
                            if(isset($_GET["type"])) {
                                $type = $_GET["type"];
                                
                                if($type == "product") {
                                    echo '<thead><tr><th>ID</th><th>Product Name</th><th>Category</th><th>Price</th><th>Quantity</th><th>Created at</th><th>Updated at</th></tr></thead>';
                                }
                                elseif($type == "job_resume") {
                                    echo '<thead><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone no</th><th>Position</th><th>Interview Date</th><th>Interview Time</th><th>Cover Letter</th><th>Resume file path</th></tr></thead>';
                                }
                                elseif($type == "feedback") {
                                    echo '<thead><tr><th>ID</th><th>Feedback</th><th>Name</th><th>Email</th><th>Message</th><th>Store Visited</th></tr></thead>';
                                }
                                elseif($type == "users") {
                                    echo '<thead><tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th></tr></thead>';
                                }
                            }
                            ?>
                            <tbody>
                                <?php 
                                include("db_connect.php");

                                if(isset($_GET["search"]) && isset($_GET["type"])) {
                                    $filterValues = $_GET["search"];
                                    $type = $_GET["type"];
                                    $query = "";

                                    // Construct the query dynamically
                                    if ($type == "product") {
                                        $query = "SELECT * FROM product WHERE CONCAT(product_name, category, price, stock_quantity) LIKE '%$filterValues%'";
                                    }
                                    elseif ($type == "job_resume") {
                                        $query = "SELECT * FROM job_resume WHERE CONCAT(firstName, lastName, email, position) LIKE '%$filterValues%'";
                                    }
                                    elseif ($type == "feedback") {
                                        $query = "SELECT * FROM feedback WHERE CONCAT(name, email, contact, store_visited) LIKE '%$filterValues%'";
                                    }
                                    elseif ($type == "users") {
                                        $query = "SELECT user_id, username, email, role FROM users WHERE CONCAT(user_id, username, email, role) LIKE '%$filterValues%'";
                                    }

                                    $result = mysqli_query($connect, $query);

                                    if(mysqli_num_rows($result) > 0){
                                        foreach($result as $items) {
                                            echo "<tr>";
                                            foreach($items as $value) {
                                                echo "<td>" . htmlspecialchars($value) . "</td>";
                                            }
                                            echo "</tr>";
                                        }
                                    } else {  
                                        echo '<tr><td colspan="5">No Record Found</td></tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
