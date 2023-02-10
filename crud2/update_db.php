<?php
// connect to database
include 'conn.php';

// capture data from form
$CustomerNumber = $_POST['CustomerNumber'];
$Name = $_POST['Name'];
$Address = $_POST['Address'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];

// update data
mysqli_query($conn,"update Customers set Name='$Name', Address='$Address', Email='$Email', Phone='$Phone' where CustomerNumber='$CustomerNumber'");

// redirect page to index.php
header("location:index.php");

?>
