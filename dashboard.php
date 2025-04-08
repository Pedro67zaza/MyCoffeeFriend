<?php


// Include database connection
session_start();
include("db_connect.php");


// Fetch summary data
$totalApplications = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as total FROM job_resume"))['total'];
$totalProducts = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as total FROM product"))['total'];
$totalFeedback = mysqli_fetch_assoc(mysqli_query($connect, "SELECT COUNT(*) as total FROM feedback"))['total'];

// Fetch recent feedback
$recentFeedback = mysqli_query($connect, "SELECT name, feedback FROM feedback ORDER BY feedback_id DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .dashboard-container {
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container dashboard-container">
    <h2 class="mb-4">Admin Dashboard</h2>

    <h2>Welcome, <?= $_SESSION['username'] ?></h2>
    <p>You are logged in as <?= $_SESSION['role'] ?></p>

    <!-- Summary Cards -->
    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Applications</h5>
                    <p class="card-text"><?= $totalApplications ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text"><?= $totalProducts ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Total Feedback</h5>
                    <p class="card-text"><?= $totalFeedback ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Feedback -->
    <h4 class="mt-4">Recent Feedback</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($recentFeedback)) { ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= nl2br(htmlspecialchars($row['feedback'])) ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
