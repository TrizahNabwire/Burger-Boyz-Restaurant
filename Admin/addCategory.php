<?php
session_start();
    include("../Authentication/connection.php");
    // include("adminLoginCheck.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
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

    <div class="container mt-4">
        <h2>Add Category</h2>
        <br>
        <?php
        if (isset($_SESSION['addcategory']))
         {
            echo $_SESSION['addcategory'];
            unset($_SESSION['addcategory']);
        }

        if (isset($_SESSION['upload'])) 
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <br>
    <div class="container">
        <!--  enable file uploads within a form and ensure that the form data is properly encoded for file uploads, you should include the enctype="multipart/form-data" -->
    <form method="post" enctype="multipart/form-data" action="">
        <table class="table">
            <tr>
                <td>Title</td>
                <td><input type="text" class="form-control" id="titlet" name="title" placeholder="Category Title"></td>
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
                        <input class="form-check-input" type="radio" name="featured" id="featured" value="Yes">
                        <label class="form-check-label" for="featuredYes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="featured" id="featured" value="No">
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
                    <input class="form-check-input" type="radio" name="active" id="active" value="Yes">
                        <label class="form-check-label" for="activeYes">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="active" id="active" value="No">
                        <label class="form-check-label" for="activeNo">
                            No
                        </label>
                    </div>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

<?php
if (isset($_POST['submit'])) 
{
    # get the value form category form
    $title = $_POST['title'];

    // for radio input, we need to check whether the button is selected or not
    if (isset($_POST['featured'])) 
    {
        # get the value from form
        $featured = $_POST['featured'];
    }else {
        // set the default value
        $featured = "No";
    }

    if (isset($_POST['active'])) 
    {
        $active = $_POST['active'];
    }
    else 
    {
        $active = "No";
    }

    // check whether image is selected or not and set the value for the image
    // print_r($_FILES['image']);
    //die(); //break the echo

    if (isset($_FILES['image']['name']))
     {
        // upload the image
        // to upload the image we need image_name, source path and destination path
        $image_name = $_FILES['image']['name'];

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
            header("Location: addCategory.php");
            // stop the process
            die();
        }

    }else {
        // don't upload image and set the image_name value as blank
        $image_name = " ";
    }

    // creating SQL Query to insert Category into database
    $query = "INSERT INTO category SET
    title = '$title',
    image_name = '$image_name',
    featured = '$featured',
    active = '$active'
    ";

    // Executing the Query and saving in Database
    $result = mysqli_query($con, $query);

    if ($result==true)
     {
        // Query executed and category added
        $_SESSION['addcategory'] = "<div class='text-success text-center'>Category Added Successfully</div>";
        header("Location: manageCategory.php");
        
    }else {
        // Failed to Add category
        $_SESSION['addcategory'] = "<div class='text-danger text-center'>Failed to Add Category</div>";
        header("Location: addCategory.php");
        die();
    }

}
?>
</div>
</body>
</html>