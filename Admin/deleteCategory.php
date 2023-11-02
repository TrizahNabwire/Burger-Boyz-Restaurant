<?php
    include("../Authentication/connection.php");
    include("adminLoginCheck.php");
// change whether the id and image name value is set or not
if (isset($_GET['id']) AND isset($_GET['image_name'])) {
    // get the value and delete
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    // remove the physical image file is available
    if ($image_name != "") {
        # code...
        // image is available so remove it
        $path = "../images/category/".$image_name;

        // remove the image
        $remove = unlink($path);

        // if failed to remove image then add an error message and stop the process
        if ($remove == false) {
            # code...
            $_SESSION['remove'] = "<div class='text-danger text-center'>Failed to Remove Category Image.</div>";
            header("Location: manageCategory.php");
            die();
        }
    }
    // delete from database
    $query = "DELETE FROM category WHERE id = $id";
    $result =mysqli_query($con, $query);

    // check whether the data is deleted from database or not
    if ($result==true) {
        # code...
        $_SESSION['delete'] = "<div class='text-success text-center'>Category Deleted Successfully.</div>";
        header("Location: manageCAtegory.php");

    }else {
        # code...
        $_SESSION['delete'] = "<div class='text-danger text-center'>Failed to Delete Category.</div>";
        header("Location: manageCAtegory.php");
    }
}else{
    // redirect to manage category page
    header("Location: manageCategory.php");
}
?>