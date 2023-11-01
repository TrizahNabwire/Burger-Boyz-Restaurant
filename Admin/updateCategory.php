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
    <title>Update Category</title>
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
                    <li class="nav-item ">
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
    <br>

    <div class="container mt-4">
        <h2>Update Category</h2>
        <br><br>

        <?php 
        if (isset($_GET['id'])) {
            // get id and all other details
            $id = $_GET['id'];

            // SQL Query to get other details
            $query = "SELECT * FROM category WHERE id=$id";

            // execute query
            $result = mysqli_query($con, $query);

            // count rows to check whether the id is valid or not
            $count = mysqli_num_rows($result);

            if ($count==1) {
                // get all the data from database and save it row in array format
                $row = mysqli_fetch_assoc($result);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            }else{
                $_SESSION['no-category-found'] = "<div class = 'text-danger text-center'>Category Not Found </div>";
                header("Location: manageCategory.php");

            }
        }else {
            header("Location: manageCategory.php");
        }
        ?>

        <div class="container">
        <!--  enable file uploads within a form and ensure that the form data is properly encoded for file uploads, you should include the enctype="multipart/form-data" -->
    <form method="post" enctype="multipart/form-data" action="">
        <table class="table">
            <tr>
                <td>Title</td>
                <td><input type="text" value="<?php echo $title; ?>" class="form-control" id="title" name="title" placeholder="Category Title"></td>
            </tr>
            <tr>
                <td>Current Image</td>
                <td>
                    <?php
                    if ($current_image!="") {
                        ?>
                        <img src="../images/category/<?php echo $current_image ?>" width="150px" alt="">
                        <?php
                    }else {
                        echo "<div class='text-danger text-center'>Image Not Added</div>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Select Image</td>
                <td>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image" name="image">Choose file</label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Featured</td>
                <td>
                    <div class="form-check">
                        <input <?php if($featured=="Yes"){echo "checked";} ?> class="form-check-input" type="radio" name="featured" id="featured" value="Yes">
                        <label class="form-check-label" for="featuredYes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input <?php if($featured=="No"){echo "checked";} ?> class="form-check-input" type="radio" name="featured" id="featured" value="No">
                        <label class="form-check-label" for="featuredNo">
                            No
                        </label>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Active</td>
                <td>
                    <div class="form-check">
                    <input <?php if($active=="Yes"){echo "checked";} ?>  class="form-check-input" type="radio" name="active" id="active" value="Yes">
                        <label class="form-check-label" for="activeYes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input <?php if($active=="No"){echo "checked";} ?>  class="form-check-input" type="radio" name="active" id="active" value="No">
                        <label class="form-check-label" for="activeNo">
                            No
                        </label>
                    </div>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary" name="submit">Update Category</button>
</form>

        </div>
    </div>
</body>
</html>