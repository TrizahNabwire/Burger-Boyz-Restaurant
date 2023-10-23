
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
    // echo "Admin Deleted";
    

    // session variable delete
    $_SESSION['delete'] = "<div class='text-success'>Admin Deleted Successfully</div>";

    header("Location: manageAdmin.php");
}else
 {
    # code...
    // echo "Failed to Delete Admin";

    $_SESSION['delete'] = "<div class='text-danger'>Failed to Delete Admin. Try Again Later</div>";

    header('Location: manageAdmin.php');

}


// Redirect to manage Admin page
?>
<html>
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</html>