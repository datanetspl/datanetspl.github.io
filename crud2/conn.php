<?php
        $conn = mysqli_connect("localhost","root","","crud");

// Check connection
        if (mysqli_connect_errno()){
                        echo "Failed to connect DB : " . mysqli_connect_error();
                }

?>
