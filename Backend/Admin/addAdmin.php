<?php
session_start();
    include("../Authentication/connection.php");
    include("adminLoginCheck.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- <a class="navbar-brand" href="manageAdmin.php">Add Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
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

    <div class="container mt-4">
        <h2>Add Admin</h2>

        <?php
    if (isset($_SESSION['add'])) //checking whether the session is set or not
    { 
        # code...
        echo $_SESSION['add']; //Displaying session message if set

        unset($_SESSION['add']); //Removing session message
    }

    ?>
        <!-- Admin Registration Form Table -->
        <form method="post">
            <table class="table">
                <tr>
                    <td><label for="fullname">Full Name:</label></td>
                    <td><input type="text" id="full_name" name="full_name" class="form-control" placeholder="Enter your Full Name" required></td>
                </tr>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" id="username" name="username" class="form-control" placeholder="Enter your Username" required></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required></td>
                </tr>
            </table>
            <button type="submit" name="submit" class="btn btn-primary">Add Admin</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        # code...
        // Get Data From Form
        // $full_name = $_POST['full_name'];
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);  //Password Encryption with MD5

        // Prevent SQL Injection
        $full_name = mysqli_real_escape_string($con, $_POST['full_name']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, md5($_POST['password']));

        // SQL Query to save data into Database - admin table

        $query = "INSERT INTO admin SET
        full_name = '$full_name',
        username = '$username',
        password = $password
        ";
        
        // Execute Query and Save Data in Database
        // $result = mysqli_query($con, $query) or die(mysqli_error());

        // $query = "INSERT INTO admin (full_name,username,password) values ('$full_name', '$username','$password')";
        $result= mysqli_query($con, $query) ;
        // or die(mysqli_error());

        if($result==TRUE)
        {
            // Create Session Variable to display message
            $_SESSION['add'] = "Admin Added Successfully";

            // Redirect
            header("Location: manageAdmin.php");
            die;
            
        }else {
            # code...
            // Create Session Variable to display message
            $_SESSION['add'] = "Failed to Add Admin";

            // Redirect
            header("Location: addAdmin.php");
            die;
        }
        
    }
    
?>






