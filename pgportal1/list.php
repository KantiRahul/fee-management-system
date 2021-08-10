<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | PG Portal</title>
    <link rel="stylesheet" href="main.css">
    
</head>

<?php 

include_once("func.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if( isset($_POST['name']) && isset($_POST['fath_name']) && isset($_POST['moth_name']) && isset($_POST['DOB']) && isset($_POST['age']) && isset($_POST['gender']) && isset($_POST['adhar_number']) && isset($_POST['religion']) && isset($_POST['caste']) && isset($_POST['branch']))
    {
        $usn=date("Y").strtoupper($_POST['branch']).rand(1,120);
        $name=$_POST['name'];
        
        $fath_name=$_POST['fath_name'];
        $moth_name=$_POST['moth_name'];
        $DOB=$_POST['DOB'];
        $age=$_POST['age'];
        $gender=$_POST['gender'];
        $adhar_number=$_POST['adhar_number'];
        $len=strlen((string)$adhar_number);
        $religion=$_POST['religion'];
        $caste=$_POST['caste'];
        $branch=$_POST['branch'];
    
            register($usn, $name, $fath_name, $moth_name, $DOB, $age, $gender, $adhar_number, $religion, $caste, $branch);
        
      
            header('location: index.php');
    }
    else
    {
        echo '<script>alert("Enter data correctly")</script>';
    }
}
?>
<style>
.inputar:valid {
  color: black;
}
.inputar:invalid {
  color: red;
}
</style>
<body>
    
        <form action="list.php" method="post" class="container" >
            
            <table>
                
                <tr>
                    <td>    Name:   </td>
                    <td>    <input type="text" name="name"  placeholder="Enter Full Name">     </td>
                </tr>
            
                <tr>
                    <td>    Father Name: </td>
                    <td>    <input type="text" name="fath_name"  placeholder="Enter Father's Name">    </td>
                </tr>
            
                <tr>
                    <td>    Mother Name: </td>
                    <td>    <input type="text" name="moth_name"  placeholder="Enter Mother's Name">    </td>
                </tr>

                <tr>
                    <td>    DOB: </td>
                    <td>    <input type="date" name="DOB">    </td>
                </tr>

                <tr>
                    <td>    Age: </td>
                    <td>    <input type="text" name="age" maxlength='2' pattern='\d{2}' placeholder="00">    </td>
                </tr>

                <tr>
                    <td>     Gender:    </td>
                    <td>    <input type="radio" name="gender" value="female">Female
                            <input type="radio" name="gender" value="male">Male
                            <input type="radio" name="gender" value="other">Other    </td>
                </tr>

                <tr>     
                    <td>    Adhaar Number:   </td>
                    <td>    <input type="text" class="inputar" maxlength="12"   name="adhar_number" placeholder="Enter 12-digit Adhaar number" pattern="\d{12}">     </td>
                </tr>

                <tr>
                    <td>    Religion:   </td>
                    <td>    <input type="text" name="religion"  placeholder="Enter Religion">     </td>
                </tr>

                
                <tr>
                    <td>    Caste:  </td>
                    <td>    <input type="text" name="caste"  placeholder="Enter Caste">    </td>
                </tr>

                
                <tr>
                    <td>     Branch:    </td>
                    <!-- <td>    <input type="text" name="branch"> -->
                    <td>
                    <select name="branch" >
  <option value="CSE">CSE</option>
  <option value="ISE">ISE</option>
  <option value="ECE">ECE</option>
  <option value="TCE">TCE</option>
  <option value="MEC">MEC</option>
  <option value="IEM">IEM</option>
</select>   </td>
                </tr>
            </table>

            <!-- Comment: <textarea name="comment" rows="5" cols="40"></textarea> -->
            <div style="text-align:center">
                <input type="submit" name="submit" value="Submit">
            </div>
            
        </form>
    
</body>
</html>

