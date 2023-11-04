<?php
session_start();
    include("../Authentication/connection.php");
    include("adminLoginCheck.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Food</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="manageFood.php">Manage Food</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="adminHomepage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manageAdmin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manageCategory.php">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="manageFood.php">Food</a>
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

    <!-- Button to Add Food -->
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="addFood.php" class="btn btn-primary">Add Food</a>
    <br><br>
    <?php
    if (isset($_SESSION['add'])) {
        # code...
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    ?>

    <!-- Table -->
    <div class="container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <?php
            // create SQL query to get all the food
            $query = "SELECT * FROM food";

            // execute query
            $result = mysqli_query($con,$query);

            // count rows to check whether we have food or not
            $count = mysqli_num_rows($result);

            $sn =1;

            if ($count>0) {
                // we have food in database
                // Get the Foods from Database and display
                while ($row=mysqli_fetch_assoc($result)) {
                    // get the value from individual columns
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    ?>

<tbody>
                <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $price; ?></td>
                    <td>
                        <?php 
                        // echo $image_name;

                        // check whether we have image or not
                        if ($image_name=="") {
                            # code...
                            // we do not have image 
                            echo "<div class='text-danger text-center'>Image Not Added.</div>";
                        }else {
                            // we have image
                            ?>
                            <img src="../images/category/" <?php echo $image_name; ?> width="100px">
                            <?php
                        }
                         ?>
                    </td>
                    <td><?php echo $featured; ?></td>
                    <td><?php echo $active; ?></td>
                    <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="updateFood.php"><button class="btn btn-primary">Update Food</button></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="deleteFood.php"><button class="btn btn-danger">Delete Food</button></a>
                </td>
                </tr>
            </tbody>
                    <?php
                }
            }else {
                // Food not added in database
                echo "<tr> <td colspan='7' class='text-danger'>Food Not Added Yet</td></tr>";
            }
            ?>
            
                <!-- <tr>
                <td>2</td>
                    <td>Jane Trizah</td>
                    <td>janetrizah01</td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary">Update Admin</button>
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
            </tbody>
        </table>
    </div>

    

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
