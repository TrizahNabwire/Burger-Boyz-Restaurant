<?php
session_start();
    include("../Authentication/connection.php");

// get the id of Admin to be deleted
 $id = $_GET['id'];

// Create SQL Query to delete Admin
$query = "DELETE FROM admin WHERE id = $id";

// Execute Query
$result = mysqli_query($con, $query);

// check whether Query executed successfully

if ($result==TRUE)
 {
    # code...
    echo "Admin Deleted";
}else
 {
    # code...
    echo "Failed to Delete Admin";
}


// Redirect to manage Admin page
?>