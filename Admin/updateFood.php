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

    <div class="container mt-4">
        <h2>Update Food</h2>
        <br><br>

        <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" class="form-control" placeholder="Food Title"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" class="form-control" rows="4" placeholder="Food Description"></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price" class="form-control" placeholder="Food Price"></td>
                </tr>
                <tr>
                    <td>Current Image</td>
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

                        if ($count>0) {
                            // category available
                            while ($row=mysqli_fetch_assoc($result)) {
                                $category_title = $row['title'];
                                $category_id = $row['id'];

                                echo "<option value='$category_id'>$category_title</option>";
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
            <input type="submit" value="Update Food" name="submit" class="btn btn-primary">
        </form>
    </div>