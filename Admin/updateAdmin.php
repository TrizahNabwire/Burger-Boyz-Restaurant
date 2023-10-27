<?php
session_start();
    include("../Authentication/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin</title>
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
        <h2>Update Admin</h2>
        <br>

        <?php
            // get id selected Admin
            $id = $_GET['id'];

            //  create sql query to Get the details
            $query = "SELECT * FROM admin WHERE id=$id";

            // execute query
            $result = mysqli_query($con, $query);

            // check whether query is executed or not
            if ($result==TRUE) {
                # code...
                // check whether the data is available or not
                $count = mysqli_num_rows($result);

                // check whether we have admin data or not
                if ($count==1) {
                    # code...
                    // get the details
                    $row = mysqli_fetch_assoc($result);

                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }else {
                    
                    // Redirect to manage Admin page
                    header("Location: manageAdmin.php");
                    die;
                }
            }
        ?>

<form method="post">
            <table class="table">
                <tr>
                    <td><label for="fullname">Full Name:</label></td>
                    <td><input type="text" id="full_name" name="full_name" value="<?php echo $full_name ?>" class="form-control" placeholder="Enter your Full Name" required></td>
                </tr>
                <tr>
                    <td><label for="username">Username:</label></td>
                    <td><input type="text" id="username" name="username" value="<?php echo $username ?>" class="form-control" placeholder="Enter your Username" required></td>
                </tr>

                <!-- Having used md5 encryption we can not decrypt the password,will change password from changePassword.php -->
                <!-- <tr>
                    <td><label for="password">Password:</label></td>
                    <td><input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" required></td>
                </tr> -->
            </table>
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <button type="submit" name="submit" class="btn btn-primary">Update Admin</button>
        </form>
    </div>

    <?php
    // check whether the submit button is clicked or not
    if (isset($_POST['submit'])) {
        # code...
        // get all the values from form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        // create SQL Query to update Admin
        $query = "UPDATE admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id = '$id'
        ";

        // execute the query
        $result = mysqli_query($con, $query);

        // check the Query executed successfully or not
        if ($result==TRUE) {
            # code...
            // Query executed and Admin updated
            $_SESSION['update'] = "<div class ='text-success text-center'>Admin Updated Successfully </div>";

            // Redirect
            header("Location: manageAdmin.php");
            die;
        }
        else {
            
            // Failed to update Admin
            $_SESSION['update'] = "<div class ='text-danger text-center'>Failed to Update Admin </div>";

            // Redirect
            header("Location: manageAdmin.php");
            die;
        }
    }

?>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>