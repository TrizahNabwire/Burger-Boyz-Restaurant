<?php
session_start();
    include("../Authentication/connection.php");

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Admin Login</title>
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <br>


                    <?php
                    if (isset($_SESSION['admin-login'])) {
                        # code...
                        echo $_SESSION['admin-login'];
                        unset($_SESSION['admin-login']);
                    }

                    if (isset($_SESSION['not-logged-in'])) 
                    {
                        # code...
                        echo  $_SESSION['not-logged-in'];
                        unset($_SESSION['not-logged-in']);
                    }

                    ?>

                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            </div>
                            <button type="submit" name="submit" class="btn1 btn-primary btn-block">Login</button>
                        </form>
                    </div>
                    <!-- <div class="card-footer">
                        Don't have an account? <a href="signup.php">Signup</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php

if (isset($_POST['submit'])) {
    # code...
    // get the data from login form
    // $username = $_POST['username'];
    // $password = md5($_POST['password']);

    // Prevent SQL Injection using mysqli_real_escape_string()
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));
   

    // SQL to check whether the user with username and password exists or not
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ";

    // execute the Query
    $result = mysqli_query($con, $query);

    // count rows to check whether the user exists or not
    $count = mysqli_num_rows($result);

    if ($count==1) {
        # code...
        // user available
        $_SESSION['admin-login'] = "<div class='text-success text-center'>Login Successful.</div>";

        $_SESSION['user'] = $username; //checks whether the user is logged in or not and logout will unset it

        // redirect to Admin Homepage
        header("Location: adminHomepage.php");

    }else {
        # code...
        // user not available and login failed
        $_SESSION['admin-login'] = "<div class='text-danger text-center'>Username and Password did not match</div>";

        // redirect
        header("Location: adminLogin.php");
    }
}
?>