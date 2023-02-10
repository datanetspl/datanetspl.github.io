<style>
form {
    width: 70%;
}

    input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
</style>
<body style="background-color:whitesmoke;">
<center>
    <h3> Add Customer </h3>
<?php

require_once('customer.php');

 
 $form = new Customer; 

echo $form->MakeForm(Customer::class);

?>
</center>
</body>
<script>
    document.getElementById('Customer[Phone]').onchange = function() {

        var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
  if(document.getElementById('Customer[Phone]').value.match(phoneno)) {
    return true;
  }  
  else {  
    alert("Invalid Phone Number");
    return false;
  }
    }
    </script>