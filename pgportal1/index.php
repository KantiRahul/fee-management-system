

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Home | PG Portal</title>
<style>
  body{background:#5ba4cf}
</style>
</head>


<body>
<?php
include_once "func.php";

$result=select();

?>
<button class='btn btn-add'><a href='list.php'>Add Student </a></button>
<button class='btn btn-add'><a href='fee_list.php'>Fee List </a></button>
<button class='btn btn-add'><a href='fee_transaction.php'>Make Transaction </a></button>
<button class='btn btn-add'><a href='fee_register.php'>Fee Register </a></button>
<br><br><br>

<table id="info">
  <tr>
    <th>USN</th>
    <th>Name</th>
    <th>Father Name</th>
    <th>Mother Name</th>
    <th>DOB</th>
    <th>Age</th>
    <th>Gender</th>
    <th>Adhaar Number</th>
    <th>Religion</th>
    <th>Caste</th>
    <th>Branch</th>
    <th colspan=2>Action</th>
    
  </tr>
  <tr>
    <?php 
    
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo  "<td>".$row["USN"]. "</td>";
    echo  "<td>".$row["Name"]. "</td>";
    echo  "<td>".$row["Father_name"]. "</td>";
    echo  "<td>".$row["Mother_name"]. "</td>";
    echo  "<td>".$row["DOB"]. "</td>";
    echo  "<td>".$row["Age"]. "</td>";
    echo  "<td>".$row["Gender"]. "</td>";
    echo  "<td>".$row["Adhar_number"]. "</td>";
    echo  "<td>".$row["Religion"]. "</td>";
    echo  "<td>".$row["Caste"]. "</td>";
    echo  "<td>".$row["branch"]. "</td>";
    echo "<td><button type='button' class='btn btn-edit'><a href='update.php?usn=".$row["USN"]."'>Edit</a></button>
              <button type='button' class='btn btn-delete'><a href='delete.php?usn=".$row["USN"]."'>Delete</a></button></td>";
    echo "</tr>";
    
  }
} 
    ?>
  </tr>
  
</table>

</body>
</html>