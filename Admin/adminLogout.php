<?php

    include("../Authentication/connection.php");

// destroy session
    session_destroy(); //Also unsets $_SESSION['user']

    // redirect
    header("Location: adminLogin.php");
?>