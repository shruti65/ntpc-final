<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDatabase</title>
    <style>
        body{
            font-size: 100px;
            margin-top: 100px;
            margin-left:500px;
            color: #00a087;
            
        }
    </style>
   
</head>
<body>

<?php

$serial1 = $_GET['serial1'];
$link = mysqli_connect("localhost", "root", "", "material");
  
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
  
$sql = "UPDATE room SET work= IF(work='no','yes','no') WHERE serial1='$serial1'";
if(mysqli_query($link, $sql)){
    echo "Record was updated successfully.";
} 
else{
    echo "ERROR: Could not able to execute $sql. " 
                                   . mysqli_error($link);
}
mysqli_close($link);
?>
</body>
</html>


