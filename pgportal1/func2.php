<?php 
require_once "conn.php";

function  registerfee($oldusn,$newusn,$amount)
{
    global $conn; 
    $status='0';

    $stmt = $conn->prepare("INSERT INTO `fee` (`USN`, `total_amount`, `status`) VALUES (?, ?, ?);");
    $stmt->bind_param("sdi",$newusn, $amount, $status);
    $res1=$stmt->execute();


    $stmt2=$conn->prepare("UPDATE `student` SET `USN`=? WHERE `USN`=?");
    $stmt2->bind_param("ss", $newusn, $oldusn);
    $res2=$stmt2->execute();
    if($res1==1 && $res2==1)
    {
        echo "<script>alert('Student fee has been added successfully.');</script>";
    }
    else
    {
        echo "<script>alert('Transaction hasn't  been added.');</script>";
    }
}




function selectfees()
{

    global $conn; 

$res=[];
    $stmt = $conn->query("SELECT * FROM `fee`");
   
  return $stmt;
}



function selectfeesusn($usn)
{

    global $conn; 

$res=[];
    $stmt = $conn->query("SELECT * FROM `fee` WHERE USN='".$usn."'");
   
  return $stmt;
}

function selecttransusn($usn)
{

    global $conn; 

$res=[];
    $stmt = $conn->query("SELECT * FROM `transaction` WHERE USN='".$usn."'");
   
  return $stmt;
}


function maketransaction($usn,$amount)
{
    global $conn; 

    $result=selectfeesusn($usn);

    while($row = mysqli_fetch_assoc($result))
{
   
    $total= $row['total_amount'];
  
    
}
    $balance=$total-$amount;
    $stmt = $conn->prepare("INSERT INTO `transaction`( `USN`, `amount_paid`) VALUES (?,?)");
    $stmt->bind_param("sd",$usn, $amount);
    $res1=$stmt->execute();


    $result1=getsum($usn);

    while($row = mysqli_fetch_assoc($result1))
{
    
   
    $total1= $row['tot'];
    $balance1=$total-$total1;
 
    
}


    $stmt2=$conn->prepare("UPDATE `fee` SET `balance_amount`=? WHERE `USN`=?");
    $stmt2->bind_param("ds", $balance1, $usn);
    $res2=$stmt2->execute();
    if($res1==1 && $res2==1)
    {
        echo "<script>alert('Student fee has been added successfully.');</script>";
    }
    else
    {
        echo "<script>alert('Transaction hasn't  been added.');</script>";
    }

}

function getsum($usn)
{

    global $conn;
    $stmt = $conn->query("SELECT SUM(amount_paid) AS tot FROM transaction WHERE USN='".$usn."'");


   
  return $stmt;
}
function selectallusn()
{

    global $conn; 

$res=[];
    $stmt = $conn->query("SELECT USN FROM student");
   
  return $stmt;
}
?>