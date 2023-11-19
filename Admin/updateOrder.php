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
    <title>Update Order</title>
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

    <div class="container mt-4">
        <h2>Update Order</h2>
        <br><br>
        <?php
        // check whether id is set or not
        if(isset($_GET['id'])){
            // get the order details
            $id = $_GET['id'];

            // get all other details based on this id
            // sql query to get the other details
            $query = "SELECT * FROM tbl_order WHERE id = $id";

            $result = mysqli_query($con, $query);
    
            // get the value based on query executed
            $count = mysqli_num_rows($result);
    
            if($count==1){
            // get the individual values of selected order
                $row = mysqli_fetch_assoc($result);
                $food = $row['food'];
                $price = $row['price'];
                $quantity = $row['quantity'];
                $total = $row['total'];
                $order_date = $row['order_date'];
                $status = $row['status'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_email = $row['customer_email'];
                $customer_address = $row['customer_address'];
            }else{
                // detail not available
                // redirect
                header("Location: manageOrder.php");

            }
    

        }else{
            // redirect
            header("Location: manageOrder.php");
        }
        ?>

        <div class="container">
            <form action="" method="post">
                <table class="table table-bordered">
                    <tr>
                        <td>Food</td>
                        <td><b><?php echo $food; ?></b></td>
                    </tr>

                    <tr>
                        <td>Price</td>
                        <td><b> Ksh. <?php echo $price; ?></b></td>
                    </tr>

                    <tr>
                        <td>Quantity</td>
                        <td>
                            <input type="number" name="quantity" class="form-control"  value="<?php echo $quantity; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status" class="form-control" >
                                <option <?php if($status=="Ordered"){echo "selected";}?> value="Ordered">Ordered</option>
                                <option <?php if($status=="On Delivery"){echo "selected";}?> value="On Delivery">On Delivery</option>
                                <option <?php if($status=="Delivered"){echo "selected";}?>  value="Delivered">Delivered</option>
                                <option <?php if($status=="Cancelled"){echo "selected";}?> value="Cancelled">Cancelled</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Customer Name</td>
                        <td>
                            <input type="text" name="customer_name" class="form-control"  value="<?php echo $customer_name; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Contact</td>
                        <td>
                            <input type="text" name="customer_contact" class="form-control"  value="<?php echo $customer_contact; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Email</td>
                        <td>
                            <input type="email" name="customer_email" class="form-control" value="<?php echo $customer_email; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Address</td>
                        <td>
                            <textarea type="text" name="customer_address" class="form-control" ><?php echo $customer_address; ?></textarea>
                        </td>
                    </tr>
                </table>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="price" value="<?php echo $price; ?>">
                <input type="submit" value="Update Order" name="submit" class="btn btn-primary">
            </form>
        </div>
        <?php
        // check whether update button is clicked or not
        if(isset($_POST['submit'])){
            // get all the values from form
            $id = $_POST['id'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

            $total = $price * $quantity;

            $status = $_POST['status'];
            
            $customer_name = $_POST['customer_name'];
            $customer_contact = $_POST['customer_contact'];
            $customer_email = $_POST['customer_email'];
            $customer_address = $_POST['customer_address'];

            // update the values
            $query1 = "UPDATE tbl_order SET
            quantity = $quantity,
            total = $total,
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address'
            WHERE id = $id
            ";

            // execute the query
            $result1 = mysqli_query($con, $query1);

            // check whether update or not
            if($result1==true){
                // updated
                $_SESSION['update'] = "<div class='text-success text-center'>Order Updated Successfully</div>";
                header("Location: manageOrder.php");
            }else{
                // failed to update
                $_SESSION['update'] = "<div class='text-danger text-center'>Failed to Update Order</div>";
                header("Location: manageOrder.php");
            }
        }
        ?>