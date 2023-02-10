<?php
// connect to database
include 'conn.php';

// get nim from url
$CustomerNumber = $_GET['CustomerNumber'];


// remove data from database
mysqli_query($conn,"delete from Customers where CustomerNumber='$CustomerNumber'");

// redirect page to index.php
header("location:index.php");

?>
