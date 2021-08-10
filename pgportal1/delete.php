<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <?php 
    include_once 'func.php';

if(isset($_GET['usn']))
{
    
    
    //echo   $_GET['usn'];
    
    deleteusn($_GET['usn']);
}
    ?>
</body>
</html>