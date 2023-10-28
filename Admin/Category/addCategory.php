<?php
session_start();
    include("../../Authentication/connection.php");
    include("../adminLoginCheck.php")
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
                    <li class="nav-item active">
                        <a class="nav-link" href="../adminHomepage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../manageAdmin.php">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../manageCategory.php">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../manageFood.php">Food</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../manageOrder.php">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../adminLogout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Add Category</h2>
        <br>
    <div class="container">
        <form method="POST">
        <table class="table">
            <tr>
                <td>Title</td>
                <td><input type="text" class="form-control" id="titlet" name="title"></td>
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
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</body>
</html>
