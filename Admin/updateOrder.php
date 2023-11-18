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
                    <li class="nav-item">
                        <a class="nav-link" href="manageFood.php">Food</a>
                    </li>
                    <li class="nav-item active">
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
        $query1 = "SELECT * FROM tbl_order WHERE id = $id";

        $result1 = mysqli_query($con, $query1);

        // get the value based on query executed
        $count = mysqli_num_rows($result1);

        if($count==1){
        // get the individual values of selected food
            $row1 = mysqli_fetch_assoc($result1);
            $food = $row1['food'];
            $price = $row1['price'];
            $quantity = $row1['quantity'];
            $total = $row1['total'];
            $order_date = $row1['order_date'];
            $status = $row1['status'];
            $customer_name = $row1['customer_name'];
            $customer_contact = $row1['customer_contact'];
            $customer_email = $row1['customer_email'];
            $customer_address = $row1['customer_address'];
        }


    }else{
        header("Location: manageOrder.php");
    }
    ?>

    <div class="container mt-4">
        <h2>Update Order</h2>
        <br><br>

        <div class="container">
            <form action="" method="post">
                <table class="table table-bordered">
                    <tr>
                        <td>Food</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Price</td>
                    </tr>

                    <tr>
                        <td>Quantity</td>
                        <td>
                            <select name="quantity">
                                <option value="Ordered">Ordered</option>
                                <option value="On Delivery">On Delivery</option>
                                <option value=""></option>
                            </select>
                        </td>
                    </tr>
                </table>
            </form>
        </div>