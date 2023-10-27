<?php
session_start();
    include("../Authentication/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="adminHomepage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manageAdmin.php">Admin</a>
                    </li>
                    <li class="nav-item">
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

    <!-- Button to Add Food -->
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="" class="btn btn-primary">Add Food</a>

    <!-- Table -->
    <div class="container mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>johndoe123</td>
                    <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary">Update Delete</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger">Delete Admin</button>
                </td>
                </tr>
                <tr>
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
                </tr>
            </tbody>
        </table>
    </div>

    

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
