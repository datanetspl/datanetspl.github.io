<!DOCTYPE html>
<html>
<head>
        <title>Simple CRUD</title>
</head>
<body style="background-color:whitesmoke;">

 <script>
function handleData()
{
    

}

        </script>



<center>

        <h2>SIMPLE CRUD</h2>
        <br/>
        <h3>Edit Customer</h3>

        <?php
        include 'conn.php';
        $CustomerNumber = $_GET['CustomerNumber'];
        $query = mysqli_query($conn,"select * from Customers where CustomerNumber='$CustomerNumber'");
        while($data = mysqli_fetch_array($query)){
                //$data_app=explode(', ', $data['app']);
                ?>
           <form method="post" action="update_db.php" onsubmit="return handleData()">
                <table cellpadding="3" cellspacing="0">

                     <tr>
                         <td>Name</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <td>
                           <input type="hidden" name="CustomerNumber" value="<?php echo $data['CustomerNumber']; ?>">
                           <input type="text" name="Name" value="<?php echo $data['Name']; ?>">
                         </td>
                     </tr>

                     <tr>
                         <td>Address</td>
                         <td>
                         <input type="text" name="Address" value="<?php echo $data['Address']; ?>">
                         </td>
                     </tr>

                     <tr>
                         <td>Email</td>
                         <td>
                         <input type="text" name="Email" value="<?php echo $data['Email']; ?>">
                         </td>
                     </tr>

                     <tr>
                         <td>Phone</td>
                         <td>
                         <input type="text" name="Phone" value="<?php echo $data['Phone']; ?>">
                         </td>
                     </tr>

		     
                     <tr>
                         <td></td>
                         <td><input type="submit" value="Update">&nbsp;&nbsp;</td>
                     </tr>

                </table>
           </form>
                <?php
        }
        ?>

</body>
</html>
