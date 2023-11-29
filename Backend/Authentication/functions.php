<?php

function check_login($con)
{
    // if user_id is in our database
    if(isset($_SESSION['user_id']))
    {
        $id = $_SESSION['user_id'];

        // Check from database
        $query = "select * from users where user_id = '$id' limit 1";

        // Read from Database
        $result = mysqli_query($con,$query);

        // Check if result is positive and number of rows > 0
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }

    }

    // Redirect to Login
    header("Location: Authentication/login.php");
    die;
}

// Checking if the $_SESSION value ['user_id'] exists if not we redirect to login.php
// Checking if the ['user_id'] is real, if it is return the user_data if not redirect to login.php


// Function random_num()

function random_num($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;

    }
    $len = rand(4, $length);
    for ($i=0; $i < $len ; $i++) { 
        # code...
        $text .= rand(0,9);

    }
    return $text;
}