<?php
// include("..Authentication/connection.php");
// Authorization - Access Control
// Check whether the user is logged in or not
if (!isset($_SESSION['user'])) //if a user session is not set
{
    # user is not logged in
    // redirect to login page with message
    $_SESSION['not-logged-in'] = "<div class='text-danger text-center'>Please Login to access Admin Panel.</div>";

    header("Location: adminLogin.php");

}

?>
<html>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    </html>