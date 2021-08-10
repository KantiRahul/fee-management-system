	<?php 
require_once "conn.php";

function register($usn, $name, $fath_name, $moth_name, $dob, $age, $gen, $adh, $reg, $cast, $branch)
{
    
global $conn; 


    $stmt = $conn->prepare("INSERT INTO `student`(`USN`, `Name`, `Father_name`, `Mother_name`, `DOB`, `Age`, `Gender`, `Adhar_number`, `Religion`, `Caste`, `Branch`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssisisss", $usn, $name, $fath_name, $moth_name, $dob, $age, $gen, $adh, $reg, $cast, $branch);
    $res=$stmt->execute();

    if($res==1)
    {
        echo "<script>alert('Student has been added successfully.');</script>";
    }
    else
    {
        echo "<script>alert('Student hasn't  been added.');</script>";
    }
}

function select()
{

    global $conn; 

$res=[];
    $stmt = $conn->query("SELECT * FROM student");
   
  return $stmt;
}


function selectusn($usn)
{
    
global $conn; 

$res=[];
    $stmt = $conn->query("SELECT * FROM `student` WHERE student.USN='".$usn."'");
   
  return $stmt;
}



function update($usn, $name, $fath_name, $moth_name, $dob, $age, $adh, $reg, $cast, $branch)
{
   
global $conn; 

    $stmt = $conn->prepare("UPDATE `student` SET `Name`=?,`Father_name`=?,`Mother_name`=?,`DOB`=?,`Age`=?,`Adhar_number`=?,`Religion`=?,`Caste`=?,`branch`=?  WHERE student.usn=?");
    $stmt->bind_param("ssssiissss", $name, $fath_name, $moth_name, $dob, $age, $adh, $reg, $cast, $branch,$usn);
    $res=$stmt->execute();
    
    if($res==1)
    {
        //echo "<script>alert('Record has been Updated successfully.');</script>";
        header('location: index.php');

    }
    else
    {
        echo "<script>alert('Record hasn't  Updated .');</script>";

    }
}


function deleteusn($usn)
{
 
global $conn; 

   $sql="DELETE FROM `student` WHERE student.USN='".$usn."'";
   if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record has Deleted Successful .');</script>";
    header('location: index.php');
  } else {

    echo "<script>alert('Record hasn't  Deleted .');</script>";
  }

}

?>