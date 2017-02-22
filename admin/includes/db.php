<?php
SESSION_START();

$con = mysqli_connect("localhost","root","","cms");

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


?>
