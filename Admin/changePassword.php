<?php
session_start();
    include("../Authentication/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Change Password</h2>
        <br>

        <?php
        if (isset($_GET['id'])) {
            # code...
            $id = $_GET['id'];
        }
        ?>

        <form method="post" action="">
            <table class="table">
                <tr>
                    <td><label for="Current Password">Current Password:</label></td>
                    <td><input type="password" id="currentPassword" name="currentPassword" value="<?php echo $currentPassword ?>" class="form-control" placeholder="Enter your Current Password" required></td>
                </tr>

                <tr>
                    <td><label for="New Password">New Password:</label></td>
                    <td><input type="password" id="newPassword" name="newPassword" value="<?php echo $newPassword ?>" class="form-control" placeholder="Enter your New Password" required></td>
                </tr>

                <tr>
                    <td><label for="Confirm Password">Confirm Password:</label></td>
                    <td><input type="password" id="confirmPassword" name="confirmPassword" value="<?php echo $currentPassword ?>" class="form-control" placeholder="Confirm Your Password" required></td>
                </tr>

                </table>
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
        </form>

        <?php
            // check whether the submit button is clicked or not
            if (isset($_POST['submit'])) {
                # code...
                // get data from form
                $id = $_POST['id'];
                $currentPassword =md5($_POST['currentPassword']);
                $newPassword = md5($_POST['newPassword']);
                $confirmPassword = md5($_POST['confirmPassword']);

                // check whethew the user with current id and password exists or not
                $query = "SELECT * FROM admin WHERE id=$id AND password='$currentPassword'";

                // check whether the new password and confirm password match or not
                $result = mysqli_query($con,$query);
                if ($result==TRUE) {
                    # code...
                    // check whether data exists or not
                    $count = mysqli_num_rows($result);
                    if ($count==1) {
                        # code...
                        // user exists and password can be changed
                        // echo "User Found";
                        // $_SESSION['user-not-found'] = "<div class='text-success'>User Found</div>";
                        // header("Location: manageAdmin.php");

                        // check whether the new pass word and confirm password match or not
                        if ($newPassword ==$confirmPassword) {
                            # code...
                            // update password
                            // echo "Password Match";

                            $query1 = "UPDATE admin SET
                            password = '$newPassword'
                            WHERE id=$id
                            ";

                            // execute the query
                            $result1 = mysqli_query($con,$query1);

                            // check whether query executed or not
                            if ($result==TRUE) {
                                # code...
                                $_SESSION['change-password'] = "<div class='text-success'>Password Changed Successfully</div>";
                                header("Location: manageAdmin.php");
                                
                            }
                            else {
                                # code...
                                $_SESSION['change-password'] = "<div class='text-danger'>Failed to Change Password</div>";
                                header("Location: manageAdmin.php");
                            }
                        }
                        else {
                            // redirect to manage Admin
                            $_SESSION['password-not-match'] = "<div class='text-danger'>Password Did Not Match</div>";
                        header("Location: manageAdmin.php");
                        }
                    }
                    else {
                        # code...
                        // user does not exist
                        // set message
                        // redirect
                        $_SESSION['user-not-found'] = "<div class='text-danger'>User Not Found</div>";
                        header("Location: manageAdmin.php");
                    }
                }


                // change password if all above is true
            }

?>
          <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        </body>
</html>