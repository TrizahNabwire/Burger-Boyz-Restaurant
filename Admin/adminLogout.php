<?php

    include("../Authentication/connection.php");

// destroy session
    session_destroy();

    // redirect
    header("Location: adminLogin.php");
?>