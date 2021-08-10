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

    //maketransaction('21CS107',7000.00)
    if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if(isset($_POST['usn'])&&   isset($_POST['amt']) )
    {
            $usn=$_POST['usn'];
             
            $amt=$_POST['amt'];
            

            maketransaction($usn,$amt);
    

        
    }
    else
    {
        echo '<script>alert("Enter data correctly")</script>';
    }
}
    ?>

    <form action='fee_transaction.php' method="post" class="container">

<table>
    <tr>
        <td>Enter USN: </td>
        <td><select name="usn" >
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
        <td>Enter Amount</td>
<td><input type='number' step='.01' name='amt' placeholder='Enter Amount'/></td>
</tr>
    
    
  
    

</table>
            <div style="text-align:center">
                <input type="submit" name="submit" value="Submit">
            </div>

    </form>

    
</body>
</html>