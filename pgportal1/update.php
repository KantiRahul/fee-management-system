<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Update | PG Portal</title>
</head>
<?php 
    include_once("func.php");
if(isset($_POST["updatemcq"]))
{
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['usn']) && isset($_POST['name']) && isset($_POST['fath_name']) && isset($_POST['moth_name']) && isset($_POST['DOB']) && isset($_POST['age'])  && isset($_POST['adhar_number']) && isset($_POST['religion']) && isset($_POST['caste']) && isset($_POST['branch']))
        {
            $usn=$_POST['usn'];
            $name=$_POST['name'];
            
            $fath_name=$_POST['fath_name'];
            $moth_name=$_POST['moth_name'];
            $DOB=$_POST['DOB'];
            $age=$_POST['age'];
            
            $adhar_number=$_POST['adhar_number'];
            $religion=$_POST['religion'];
            $caste=$_POST['caste'];
            $branch=$_POST['branch'];
    
            update($usn, $name, $fath_name, $moth_name, $DOB, $age, $adhar_number, $religion, $caste, $branch);
        }
        else
        {
            echo "Null";
        }
    }
}

if(isset($_GET['usn']))
{
    
    $res=selectusn($_GET['usn']);   


    

    while($row = mysqli_fetch_assoc($res))
   { 
?>
<body>
    <!--h1 style="text-align:center;font-family:Arial;font-weight:1000">UPDATE RECORD</h1-->

    <div class="container" >

        <form action="update.php" method="post">
    
            <table>
                
                <tr>
                    <td>   USN:  </td>
                    <td>    <input type="text" name="usn" value="<?php echo $row['USN']; ?>">     </td>
                </tr>
            
                <tr>
                    <td>    Name:  </td>
                    <td>      <input placeholder="Enter Full Name" type="text" name="name" value=<?php echo $row['Name']; ?>>    </td>
                </tr>
            
                <tr>
                    <td>    Father Name: </td>
                    <td>    <input type="text" placeholder="Enter Father's Name" name="fath_name" value=<?php echo $row['Father_name']; ?>>    </td>
                </tr>

                <tr>
                    <td>    Mother Name:  </td>
                    <td>    <input type="text" placeholder="Enter Mother's Name" name="moth_name"  value=<?php echo $row['Mother_name']; ?>>    </td>
                </tr>

                <tr>
                    <td>    DOB:  </td>
                    <td>    <input type="date" name="DOB"  value=<?php echo $row['DOB']; ?>>    </td>
                </tr>

                <tr>
                    <td>      Age:     </td>
                    <td>    <input type="text" name="age"  value=<?php echo $row['Age']; ?>>    </td>
                </tr>

                <tr>     
                    <td>    Adhar_no:    </td>
                    <td>    <input type="text" name="adhar_number" value=<?php echo $row['Adhar_number']; ?>>     </td>
                </tr>

                <tr>
                    <td>    Religion:  </td>
                    <td>    <input type="text" name="religion" value=<?php echo $row['Religion']; ?>>     </td>
                </tr>

                
                <tr>
                    <td>    Caste:  </td>
                    <td>    <input type="text" name="caste" value=<?php echo $row['Caste']; ?>>    </td>
                </tr>

                
                <tr>
                    <td>     Branch:    </td>
                    <td>    <select name="branch"  >
  <option value="CSE"<?php if ($row['branch'] == 'CSE') echo ' selected="selected"'; ?>>CSE</option>
  <option value="ISE" <?php if ($row['branch'] == 'ISE') echo ' selected="selected"'; ?>>ISE</option>
  <option value="ECE"<?php if ($row['branch'] == 'ECE') echo ' selected="selected"'; ?>>ECE</option>
  <option value="TCE" <?php if ($row['branch'] == 'TCE') echo ' selected="selected"'; ?>>TCE</option>
  <option value="MEC"<?php if ($row['branch'] == 'MEC') echo ' selected="selected"'; ?>>MEC</option>
  <option value="IEM"<?php if ($row['branch'] == 'IEM') echo ' selected="selected"'; ?>>IEM</option>
</select>   </td>
                </tr>

		        <!-- Comment: <textarea name="comment" rows="5" cols="40"></textarea>
 		        <br><br>
  		        Gender:
  		        <input type="radio" name="gender" value="female">Female
  		        <input type="radio" name="gender" value="male">Male
  		        <input type="radio" name="gender" value="other">Other
  		        <br><br> -->
		
            </table>

            <div style="text-align:center">
                <input type="submit" name="updatemcq" value="    Update    " />
            </div>
        </form>
    
    </div>
    <?php } }?>

</body>
</html>