<?php
session_start();
    include("connection.php");
    include("functions.php");

     // Check if user has clicked on the POST button
     if($_SERVER['REQUEST_METHOD'] == "POST")
     {
         // something was posted
         $username = $_POST['username'];
         $password = $_POST['password'];
 
         if(!empty($username) && !empty($password) && !is_numeric($username))
         {
             // read from database
             $query = "select * from users where username = '$username' limit 1";
             $result = mysqli_query($con, $query);
             if($result)
             {
                if($result && mysqli_num_rows($result) > 0)
        {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: ../Menu/homepage.php");
                        exit();
                        // die;
                    }
        }

             }
             echo "Wrong username or password";
 
         }else
         {
             echo "Wrong username or password";
         }
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Login Page</title>
    
    
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
                            <button type="submit" class="btn1 btn-primary btn-block">Login</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        Don't have an account? <a href="signup.php">Signup</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
