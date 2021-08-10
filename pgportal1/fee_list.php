

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="main.css"> 
    <title>Home | PG Portal</title>

</head>


<body>
<?php
include_once "func2.php";

$result=selectfees();

?>
<!-- <button class='btn btn-add'><a href='list2.php'>Add Transaction </a></button> -->

<br><br><br>

<table id="info">
  <tr>
    <th>USN</th>
    <th>Total Amout</th>
    <th>Balance Amount</th>
    <th>Status</th>
    
    <th colspan=2>Action</th>    
  </tr>
  <tr>
    <?php 
    
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo  "<td>".$row["USN"]. "</td>";
    echo  "<td>".$row["total_amount"]. "</td>";
    echo  "<td>".$row["balance_amount"]. "</td>";
    if($row['balance_amount']==0)
      {
        echo "<td>".'FULL PAID'.'</td>';
      }
        
    else{
        echo "<td>"."PARTIAL PAID".'</td>';
        }
   
    echo "<td><button type='button' class='btn btn-edit'><a href='fee_single.php?usn=".$row["USN"]."'>Check Status</a></button>
            </td>";
    echo "</tr>";
   
    echo "<td><button type='button' class='btn btn-edit'><a href='fee_single.php?usn=".$row["USN"]."'>Check Status</a></button>
            </td>";
    echo "</tr>"; 
  }
} 
    ?>
  </tr>
  
</table>

</body>
</html>

