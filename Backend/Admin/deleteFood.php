<?php
 include("../Authentication/connection.php");
 include("adminLoginCheck.php");

if (isset($_GET['id']) && isset($_GET['image_name'])) { // && is equal to using AND
    // Get id and image name
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];


    // remove the image if available
    if ($image_name!="") {
        # code...
        // get the image path
        $path = "../images/food/".$image_name;

        // remove image file from folder
        $remove = unlink($path);

        // check whether the image is removed or not
        if ($remove==false) {
            # code...
            // failed to remove image
            $_SESSION['upload'] = "<div class='text-danger text-center'>Failed to remove image file</div>";
            header("Location: manageFood.php");
            die(); //stops the process of deleting food
        }

    }

    // delete food from database
    $query = "DELETE FROM food WHERE id = $id";
    // execute the query
    $result = mysqli_query($con,$query);

    // check whether is executed or not and set the session message
    if ($result==true) {
        // food deleted
        $_SESSION['delete'] = "<div class='text-success text-center'>Food Deleted Successfully</div>";
        header("Location: manageFood.php");
    }else {
        // failed to delete food
        $_SESSION['delete'] = "<div class='text-danger text-center'>Failed to Delete Food</div>";
        header("Location: manageFood.php");
    }
    
}else {
    // redirect to manage food page 
    $_SESSION['unauthorized'] = "<div class='text-danger text-center'>Unauthorised Access.</div>";
    header("Location: manageFood.php");
}
?>