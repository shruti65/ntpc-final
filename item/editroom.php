<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
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
  
$sql = "DELETE FROM room WHERE serial1='$serial1';";
if(mysqli_query($link, $sql)){
    echo "Record was deleted successfully.";
} 
else{
    echo "ERROR: Could not able to execute $sql. " 
                                   . mysqli_error($link);
}
mysqli_close($link);
?>

</body>
</html>

