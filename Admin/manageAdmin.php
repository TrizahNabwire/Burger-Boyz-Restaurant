<?php
session_start();
    include("../Authentication/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admin</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="manageAmin.php">Manage Admin</a>
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
                </ul>
            </div>
        </div>
    </nav>

    <!-- Card Section -->
    <!-- <div class="container mt-4">
        <div class="row">
          
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title text-center">5</h5>
                        <h5 class="card-title text-center">Admin</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title text-center">5</h5>
                        <h5 class="card-title text-center">Category</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title text-center">5</h5>
                        <h5 class="card-title text-center">Food</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title text-center">5</h5>
                        <h5 class="card-title text-center">Order</h5>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Button to Add Admin -->
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <?php
    if (isset($_SESSION['add'])) {
        # code...
        echo $_SESSION['add']; //Displaying session message

        unset($_SESSION['add']); //Removing session message
    }

    if (isset($_SESSION['delete']))
     {
        # code...
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    if (isset($_SESSION['update']))
     {
        # code...
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }

    ?>
    <br><br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="addAdmin.php" class="btn btn-primary">Add Admin</a>

    <!-- Table -->
    <div class="container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <!-- <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>johndoe123</td>
                    <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary">Update Delete</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger">Delete Admin</button>
                </td>
                </tr> -->

                <?php
                    // Query to get all Admin
                    $query = "SELECT * FROM admin";

                    // Execute query
                    $result = mysqli_query($con, $query);

                    // Check whether the query is executed or not
                    if($result==TRUE)
                    {
                        // Count rows to check whether we have data in database
                        $count = mysqli_num_rows($result); //function to get all rows in database

                        $sn = 1;

                        // check the num of rows
                        if($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($result))
                            {

                                // get individual data
                                $id = $rows['id'];
                                $full_name = $rows['full_name'];
                                $username = $rows['username'];

                                // Display the values in our table
                                ?>
                                
                                <tr>
                                <td><?php echo $sn++ ?></td>
                                    <td><?php echo $full_name ?></td>
                                    <td><?php echo $username ?></td>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<a href="updateAdmin.php?id=<?php echo $id?>"><button class="btn btn-primary">Update Admin</button></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<a href="deleteAdmin.php?id=<?php echo $id?>"><button class="btn btn-danger">Delete Admin</button></a>
                                </td>
                                </tr>

                                <?php
                            }

                        }else {
                            # code...
                        }
                    }

                ?>

                <!-- <tr>
                <td>2</td>
                    <td>Jane Trizah</td>
                    <td>janetrizah01</td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;<a href=""><button class="btn btn-primary">Update Admin</button></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger">Delete Admin</button>
                </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Mary Johnson</td>
                    <td>maryj123</td>
                    <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary">Update Admin</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger">Delete Admin</button>
                </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>John Williams</td>
                    <td>johnwill</td>
                    <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary">Update Admin</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger">Delete Admin</button>
                </td>
                </tr> -->
            <!-- </tbody> -->
        </table>
    </div>

    

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
