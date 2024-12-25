<?php
    $con=mysqli_connect("localhost","root","","crud",4306);
    if($con== false){
        die("Connection Error:".mysqli_connect_error());
    }
?>