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
    <title>Manage category</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="manageCategory.php">Manage Category</a>
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
                    <li class="nav-item active">
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

    

    <!-- Button to Add Category -->
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="addCategory.php" class="btn btn-primary">Add Category</a>
    <br>
    <?php
    if (isset($_SESSION['addcategory']))
    {
       echo $_SESSION['addcategory'];
       unset($_SESSION['addcategory']);
   }

   if (isset($_SESSION['remove'])) {
    # code...
    echo $_SESSION['remove'];
    unset($_SESSION['remove']);
   }

   if (isset($_SESSION['delete'])) {
    # code...
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
   }

   if (isset($_SESSION['no-category-found'])) {
    # code...
    echo $_SESSION['no-category-found'];
    unset($_SESSION['no-category-found']);
   }

   if (isset($_SESSION['upload'])) {
    # code...
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
   }

   if (isset($_SESSION['update'])) {
    # code...
    echo $_SESSION['update'];
    unset($_SESSION['update']);
   }

   if (isset($_SESSION['failed-remove'])) {
    # code...
    echo $_SESSION['failed-remove'];
    unset($_SESSION['failed-remove']);
   }
   ?>
   <br>

    <!-- Table -->
    <div class="container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            // Query to get all categories from database
            $query = "SELECT * FROM category";

            // execute Query
            $result = mysqli_query($con, $query);

            // count rows
            $count = mysqli_num_rows($result);

            // create serial number variable and assign value as 1
            $sn = 1;

            // check whether we have data in database or not
            if($count>0){
                // get the data and display
                while ($row=mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    ?>
            <tbody>
                <tr>
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $title ?></td>
                    <td>
                        <?php
                        //  echo $image_name 
                        // check whether image name is available or not
                        if($image_name!=""){
                            // display the image
                            ?>
                            <img src="images/category/<?php echo $image_name; ?>" alt="" width="100px">
                            <?php
                        }else{
                            // display the message
                            echo "<div class='text-danger text-center'>Image Not Added</div>";
                        }
                        ?>
                    </td>
                    <td><?php echo $featured ?></td>
                    <td><?php echo $active ?></td>
                    <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="updateCategory.php?id=<?php echo $id; ?>"><button class="btn btn-primary">Update Category</button></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;<a href="deleteCategory.php?id=<?php echo $id; ?>&image_name =<?php echo $image_name; ?>"><button class="btn btn-danger">Delete Category</button></a>
                </td>
                </tr>
            </tbody>

                    <?php
                }

            }else{
                // display message inside table
                ?>
                <tr>
                    <td colspan="6"><div class="text-danger text-center">No Category Added</div></td>
                </tr>
                <?php
                
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
