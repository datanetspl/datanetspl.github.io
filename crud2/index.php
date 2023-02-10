<!DOCTYPE html>
<html>
<head>
        <title>CRUD</title>
</head>
<style>
table {
    width: 80%;
}

 .gg-trash {
 box-sizing: border-box;
 position: relative;
 display: block;
 transform: scale(var(--ggs,1));
 width: 10px;
 height: 12px;
 border: 2px solid transparent;
 box-shadow:
 0 0 0 2px,
 inset -2px 0 0,
 inset 2px 0 0;
 border-bottom-left-radius: 1px;
 border-bottom-right-radius: 1px;
 margin-top: 4px
}
.gg-trash::after,
.gg-trash::before {
 content: "";
 display: block;
 box-sizing: border-box;
 position: absolute
}

.gg-trash::after {
 background: currentColor;
 border-radius: 3px;
 width: 16px;
 height: 2px;
 top: -4px;
 left: -5px
}

.gg-trash::before {
 width: 10px;
 height: 4px;
 border: 2px solid;
 border-bottom: transparent;
 border-top-left-radius: 2px;
 border-top-right-radius: 2px;
 top: -7px;
 left: -2px
}

.gg-pen {
 box-sizing: border-box;
 position: relative;
 display: block;
 transform: rotate(-45deg) scale(var(--ggs,1));
 width: 14px;
 height: 4px;
 border-right: 2px solid transparent;
 box-shadow:
 0 0 0 2px,
 inset -2px 0 0;
 border-top-right-radius: 1px;
 border-bottom-right-radius: 1px;
 margin-right: -2px
}

.gg-pen::after,
.gg-pen::before {
 content: "";
 display: block;
 box-sizing: border-box;
 position: absolute
}

.gg-pen::before {
 background: currentColor;
 border-left: 0;
 right: -6px;
 width: 3px;
 height: 4px;
 border-radius: 1px;
 top: 0
}

.gg-pen::after {
 width: 8px;
 height: 7px;
 border-top: 4px solid transparent;
 border-bottom: 4px solid transparent;
 border-right: 7px solid;
 left: -11px;
 top: -2px
} 
    </style>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>

<body style="background-color:whitesmoke;">

<center>

    <h2>CRUD PHP</h2>
    <br/>
    <h3>Customers</h3>
    <a href="create.php">+ Add Customer</a>
    <br/>
    <br/>
    <table border="1">
    <tr>
    <th>SN</th>
        <th>CustomerNumber</th>
        <th>Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
        <?php
        include 'conn.php';
        $no = 1;
        $query = mysqli_query($conn,"select * from customers") or die(mysql_error());;

        # If there is no data then there will be a statement
        if(mysqli_num_rows($query) == 0) {
           echo '<tr style="background-color: #ff4d4d"><td colspan="8"><center>No Data in Database!</center></td></tr>';
           }
           else{

             while($data = mysqli_fetch_array($query)){
        ?>
           <tr>
               <td><?php echo $no++; ?>.</td>
               <td><?php echo $data['CustomerNumber']; ?></td>
               <td><?php echo $data['Name']; ?></td>
               <td><?php echo $data['Address']; ?></td>
               <td><?php echo $data['Email']; ?></td>
               <td><?php echo $data['Phone']; ?></td>
               <td style="padding: 10px;">
               <a href="update.php?CustomerNumber=<?php echo $data['CustomerNumber']; ?>" 
               <i  class="gg-pen"></i></a>
             </td>
             <td style="padding: 10px;">
    <a href="delete.php?CustomerNumber=<?php echo $data['CustomerNumber']; ?>" onclick="return checkDelete()">
             <i class="gg-trash"></i>  </a> 
                  
               </td>
           </tr>
        <?php
            }
            }
        ?>
        </table>
</center>
</body>
</html>
