<?php
include ("../Authentication/connection.php");
// include("adminLoginCheck.php");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="adminHomepage.php">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="adminHomepage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manageAdmin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manageCategory.php">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manageFood.php">Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manageOrder.php">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminLogout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    if(isset($_SESSION['admin-login'])) {
        # code...
        echo $_SESSION['admin-login'];
        unset($_SESSION['admin-login']);
    }
    ?>

    <!-- Card Section -->
    <div class="container mt-4">
        <div class="row">
          
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <?php
                        $query1 = "SELECT * FROM category";
                        $result1 = mysqli_query($con,$query1);
                        $count1 = mysqli_num_rows($result1);
                        ?>
                    <h5 class="card-title text-center"><?php echo $count1; ?></h5>
                        <h5 class="card-title text-center">Categories</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <?php
                        $query2 = "SELECT * FROM food";
                        $result2 = mysqli_query($con,$query2);
                        $count2 = mysqli_num_rows($result2);
                        ?>
                        
                    <h5 class="card-title text-center"><?php echo $count2; ?></h5>
                        <h5 class="card-title text-center">Foods</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <?php
                        $query3 = "SELECT * FROM tbl_order";
                        $result3 = mysqli_query($con,$query3);
                        $count3 = mysqli_num_rows($result3);
                        ?>
                        
                    <h5 class="card-title text-center"><?php echo $count3; ?></h5>
                        <h5 class="card-title text-center">Total Orders</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title text-center">5</h5>
                        <h5 class="card-title text-center">Revenue Generated</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <!-- <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <p>
                      &copy; 2023 Burger Boyz. All rights reserved.
                    </p>
                </div> -->

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
