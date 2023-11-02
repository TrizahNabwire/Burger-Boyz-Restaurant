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
        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-primary" name="submit">Update Category</button>
</form>
<?php
if (isset($_POST['submit'])) {
    // get all the value from the form
    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    // updating new image if selected
    // check whether image is selected or not
    if (isset($_FILES['image']['name'])) {
        // get the image details
        $image_name = $_FILES['image']['name'];

        // check whether the image is available or not
        if ($image_name!="") {
            // image is available
            // upload the new image

            // Auto Rename our image
            // Get the extension of our image jpg, png, gif -> yummyfood1.jpg
            $ext = end(explode('.', $image_name)); 
            // Renaming the Image
            $image_name = "Food_Category_".rand(000, 999).'.'.$ext; //Food_category_748.jpg

            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category".$image_name;

            // upload the image
            $upload = move_uploaded_file($source_path, $destination_path);

            // check whether the image is uploaded or not
            // and if the image is not uploaded then we will stop the process and redirect with error message
            if ($upload==false)
            {
                # set message
                $_SESSION['upload'] = "<div class ='text-danger text-center'> Failed to Upload Image. </div>";
                header("Location: manageCategory.php");
                // stop the process
                die();
            }
            // remove the current image if available
            if($current_image!=""){
                $remove_path = "../images/category/".$current_image;
                $remove = unlink($remove_path);
    
                // check whether the image is removed or not
                // if failed to remove then display message and stop the process
                if ($remove==false) {
                    # code...
                    $_SESSION['failed-remove'] = "<div class='text-danger text-center'>Failed to remove current image.</div>";
                    header("Location: manageCategory.php");
                    die();
                }

            }
           
        }else{
            $image_name = $current_image;
        }
    }else {
        $image_name = $current_image;
    }


    // update database
    $query1 = "UPDATE category SET
    title = '$title',
    image_name = '$image_name',
    featured = '$featured',
    active = '$active'
    WHERE id = $id
    ";

    // execute the query
    $result = mysqli_query($con, $query1);

    // check whether executed or not
    if ($result==true) {
        # code...
        // category updated
        $_SESSION['update'] = "<div class='text-success text-center'>Category Updated Successfully</div>";
        header("Location: manageCategory.php");
    }else {
        // failed to update category
        $_SESSION['update'] = "<div class='text-danger text-center'>Failed Update Category</div>";
        header("Location: manageCategory.php");
    }

    // redirect
    
}
?>

        </div>
    </div>
</body>
</html>