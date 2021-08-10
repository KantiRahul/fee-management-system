<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<?php

include_once 'func2.php';
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if(isset($_POST['oldusn'])&&   isset($_POST['newusn']) && isset($_POST['amount']))
    {
            $oldusn=$_POST['oldusn'];
             
            $newusn=$_POST['newusn'];
            $amount=$_POST['amount'];
            
            registerfee($oldusn,$newusn,$amount);

        // transaction($usn, $trans_id,$trans_date,$amount_paid,$balance_amount);
        // header('location: index2.php');
    }
    else
    {
        echo '<script>alert("Enter data correctly")</script>';
    }
}

?>
<form action="fee_register.php" method="post" class="container">
<table>
  <tr>
      <td>Enter Old USN:</td>
      <td><select name="oldusn" >
<?php
 
 $result=selectallusn();
  
 if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         
         echo " <option value='".$row['USN']."'>".$row['USN']."</option>";
       
     }
   } 
 
?>
  </select> </td>
  </tr>
  <tr>
      <td>Enter New USN:</td>
      <td><input type='text' name='newusn'/></td>
  </tr>
  <tr>
      <td>Enter Fee Amount:</td>
      <td><input type='number' step='.01' name='amount'/></td>
  </tr>
  </table >
              <div style="text-align:center">
                  <input type="submit" name="submit" value="Submit">
               </div>
        </form>
</body>
</html>