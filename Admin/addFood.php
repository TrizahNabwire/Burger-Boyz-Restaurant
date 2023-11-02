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

    <!-- Button to Add Food -->
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="addFood.php" class="btn btn-primary">Add Food</a>
    <br><br>
    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" class="form-control" rows="4" required></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>
                        <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" accept="image/*" required>
                        <label class="custom-file-label" for="image" name="image">Choose file</label>
                        </div>
                        </td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category" class="form-control" required>
                            <?php
                            // <!-- display categories from database -->
                            // <!-- create SQL to get all active categories from database -->
                            $query = "SELECT * FROM category WHERE active='Yes'";

                            // execute query
                            $result = mysqli_query($con,$query);

                            // count whether we have categories or not
                            $count = mysqli_num_rows($result);

                            // if count > 0, we have categories else we do not have categories
                            if ($count>0) {
                                // we have categories
                                while ($row=mysqli_fetch_assoc($result)) {
                                    // get the details of categories
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    ?>
                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                    <?php
                                }
                                ?>
                                <option value="0">No Category Found</option>
                                <?php
                                
                            }else{

                            }
                            ?>
                            <!-- <option value="Burger">Burger</option>
                            <option value="Pizza">Pizza</option>
                            <option value="Pasta">Pasta</option> -->
                            </select>
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
            <input type="submit" value="submit" class="btn btn-primary">
        </form>
    </div>
<?php
// check whether the button is clicked or not
if (isset($_POST['submit'])) {
    // Add the Food in Database
    // Get the data from form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    
    // Check whether radio button for featured and active are checked or not
    if (isset($_POST['featured'])) {
        $featured = $_POST['featured'];
    }else {
        $featured = "No"; //default
    }
    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    }else{
        $active = "No"; //default
    }

    // Upload the image if selected
    // Check whether the select is clicked or not and upload the image only if the image is selected
    if (isset($_FILES['image']['name'])) {
        // Get the details of the selected image
        $image_name = $_FILES['image']['name'];

        // check whether the image is selected or not and upload image only if selected
        if ($image_name!="") {
            # code...
            // image is selected
            // Rename the image
            // Get the extension of selected image jpg.pnh,gif....
            $ext = end(explode('.',$image_name));


            // Upload the image
        }
    }else{
        $image_name = ""; //default value as blank
    }


    // Insert into database

    // Redirect with message to Manage Food page
}
?>