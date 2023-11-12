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
    <title>Update Food</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="manageCategory.php">Category</a>
                    </li>
                    <li class="nav-item active">
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
    <?php
    // check whether id is set or not 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        // sql query to get the selected food
        $query1 = "SELECT * FROM food WHERE id = $id";

        $result1 = mysqli_query($con, $query1);

        // get the value based on query executed
        $count = mysqli_num_rows($result1);

        if($count==1){
        // get the individual values of selected food
            $row1 = mysqli_fetch_assoc($result1);
            $title = $row1['title'];
            $description = $row1['description'];
            $price = $row1['price'];
            $current_image = $row1['image_name'];
            $current_category = $row1['category_id'];
            $featured = $row1['featured'];
            $active = $row1['active'];
        }


    }else{
        header("Location: manageFood.php");
    }
    ?>

    <div class="container mt-4">
        <h2>Update Food</h2>
        <br><br>

        <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" class="form-control" placeholder="Food Title" value="<?php echo $title; ?>"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" class="form-control" rows="4" placeholder="Food Description"><?php echo $description; ?></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price" class="form-control" placeholder="Food Price" value="<?php echo $price; ?>"></td>
                </tr>
                <tr>
                    <td>Current Image</td>
                    <td>
                        <?php
                        if($current_image == ""){

                            // image not available
                            echo "<div class='text-danger text-center'>Image Not Available</div>";
                        }else {
                            // Image Available
                            ?>
                            <img src="images/food<?php echo $current_image ?>" width="100px">
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>
                        <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" accept="image/*" >
                        <label class="custom-file-label" for="image" name="image">Choose file</label>
                        </div>
                        </td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                    <select name="category" class="form-control" >
                        <?php 
                        // query to get active categories
                        $query = "SELECT * FROM category WHERE active='Yes'";

                        $result = mysqli_query($con, $query);

                        $count = mysqli_num_rows($result);
                        // check whether category is available or not
                        if ($count>0) {
                            // category available
                            while ($row=mysqli_fetch_assoc($result)) {
                                $category_title = $row['title'];
                                $category_id = $row['id'];

                                // echo "<option value='$category_id'>$category_title</option>";
                                ?>
                                <option <?php if($current_category == $category_id){echo "selected";}?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                <?php
                            }
                            
                        }else {
                            echo "<option value='0'>Category Not Available</option>";
                        }
                        ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                    <div class="form-check">
                        <input  <?php if($featured == 'Yes') {echo "checked";} ?> class="form-check-input" type="radio" name="featured" id="featured" value="Yes">
                        <label class="form-check-label" for="featuredYes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input <?php if($featured == 'No') {echo "checked";} ?> class="form-check-input" type="radio" name="featured" id="featured" value="No">
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
                    <input  <?php if($active == 'Yes') {echo "checked";} ?> class="form-check-input" type="radio" name="active" id="active" value="Yes">
                        <label class="form-check-label" for="activeYes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input  <?php if($active == 'No') {echo "checked";} ?> class="form-check-input" type="radio" name="active" id="active" value="No">
                        <label class="form-check-label" for="activeNo">
                            No
                        </label>
                    </div>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">

            <input type="submit" value="Update Food" name="submit" class="btn btn-primary">
        </form>
    </div>
    </div>
</body>
</html>

    <?php
    if (isset($_POST['submit'])) {
        // get all details from the form
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $current_image = $_POST['current_image'];
        $category = $_POST['category'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        // upload the image if selected
        // check whether upload button is clicked or not
        if(isset($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name']; //New Image name

            // check whether the file is available or not
            if ($image_name!="") {
                # code...
                // image is available
                // A. Uploading New Image 
                // rename the image
                $ext = end(explode('.', $image_name)); //gets the extension of the image

                $image_name = "Food-".rand(0000, 9999).'.'.$ext; //renames the image

                // get the source path and destination path
                $src_path = $_FILES['image']['tmp_name']; //source path
                $destination = "../images/food".$image_name; //destination path

                // upload the image
                $upload = move_uploaded_file($src_path, $destination);

                // check whether the image is uploaded or not
                if ($upload == false) {
                    # code...
                    // failed to upload
                    $_SESSION['upload'] = "<div class='text-danger text-center'>Failed to upload new image.</div>";
                    header("Location: manageFood.php");
                    // stop the process
                    die();
                }
                // B. Remove current image if available
                // remove the image if new image is uploaded and current image exists 
                if ($current_image!="") {
                    // current image is available
                    // remove the image 
                    $remove_path = "../images/food/".$current_image;

                    $remove = unlink($remove_path);
                    // check whether the image is removed or not
                    if ($remove==false) {
                        # code...
                        // failed to remove current image
                        $_SESSION['remove-failed'] = "<div class='text-danger text-center'>Failed to remove current image</div>";
                        // redirect
                        header("Location: manageFood.php");
                        // stop the process 
                        die();
                    }
                }
            }else{
                $image_name = $current_image;

            }
        }else{
            $image_name = $current_image;
        }

        // update the food in database
        $query2 = "UPDATE food SET
        title = '$title',
        description = '$description',
        price = $price,
        image_name = '$image_name',
        category_id = '$category',
        featured = '$featured',
        active = '$active'
        WHERE id = $id
        ";

        // execute the query2
        $result2 = mysqli_query($con, $query2);

        // check whether the query is executed or not
        if ($result2==true) {
            // query executed and food updated
            $_SESSION['update'] = "<div class='text-success text-center'>Food Updated Successfully.</div>";
            header("Location: manageFood.php");
        }else {
            // failed to update food
            $_SESSION['update'] = "<div class='text-danger text-center'>Failed to Update Food.</div>";
            header("Location: manageFood.php");
        }
    }
    ?>