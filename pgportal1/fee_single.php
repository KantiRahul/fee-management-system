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
<form action="fee_single.php" method="post" class="container">

<?php
include_once 'func2.php';
if(isset($_GET['usn']))
{
 
    $res=selectfeesusn($_GET['usn']);   
    $trans=selecttransusn($_GET['usn']);

}


while($row = mysqli_fetch_assoc($res))
{
    echo "USN                :".$row['USN'];
    echo "<br><br>";
    echo "Amont to be paid   :".$row['total_amount'];
    echo "<br><br>";
    echo "Balance amount     :".$row['balance_amount'];
    echo "<br><br>";
    echo "Status             :";
    if($row['balance_amount']==0)
      {
        echo 'FULL PAID';
      }
    else{
        echo 'PARTIAL PAID';
    }
    echo "<br><br>";
}
    ?>
     <div  style="text-align:center">
            
           <button id="mt"><a href="fee_transaction.php">Make Transaction</a></button>
      </div> 
          </form>
  <center><h2>Transaction Table</h2></center>
<table id="info" >
  <tr>
    <th>Transaction ID</th>
    <th>USN</th>
    <th>Transaction Date</th>
    <th>Amount Paid</th>
    
      
  </tr>
  <tr>
    <?php 
    
if ($trans->num_rows > 0) {
  // output data of each row
  while($row = $trans->fetch_assoc()) {
    echo "<tr>";
    echo  "<td>".$row["trans_id"]. "</td>";
    echo  "<td>".$row["USN"]. "</td>";
    echo  "<td>".$row["trans_date"]. "</td>";
    echo  "<td>".$row["amount_paid"]. "</td>";
   
    echo "</tr>"; 
  }
} 
    ?>
  </tr>
  
</table>

    
</body>
</html>