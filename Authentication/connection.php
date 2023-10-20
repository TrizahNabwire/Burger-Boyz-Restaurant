<?php
//  Connecting to Database 
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "burger_boyz";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("Failed to Connect!!");
}
    


