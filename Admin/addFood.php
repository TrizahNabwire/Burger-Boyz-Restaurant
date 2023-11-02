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
                    <td><input type="text" name="title" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td><textarea name="description" class="form-control" rows="4" required></textarea></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" class="form-control" required></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><input type="file" name="image" class="form-control" accept="image/*" required></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category" class="form-control" required>
                            <option value="Burger">Burger</option>
                            <option value="Pizza">Pizza</option>
                            <option value="Pasta">Pasta</option>
                            </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <label class="checkbox-inline">
                            <input type="radio" name="featured" value="Yes"> Yes
                            <input type="radio" name="featured" value="No"> No
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <label class="checkbox-inline">
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No"> No
                        </label>
                    </td>
                </tr>
            </table>
            <input type="submit" value="submit" class="btn btn-primary">
        </form>
    </div>
