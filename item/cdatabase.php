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
$materialname = $_POST['materialname'];
$mname=$_POST['mname'];
$model = $_POST['model'];
$serial1 = $_POST['serial1'];
$quantity = $_POST['quantity'];
$work=$_POST['work'];
$cname=$_POST['cname'];
$date= $_POST['date'];
$description1 = $_POST['description1'];
$fromloc = $_POST['fromloc'];
$toloc = $_POST['toloc'];
$cname=$_POST['cname'];

$conn = new mysqli('localhost','root','','material');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        $stmt = $conn->prepare("insert into goes(materialname,mname,model,serial1,quantity,work,cname,date,description1,fromloc,toloc ) values(?, ?,?, ?, ?,?,?,?, ?,?,?)");
		$stmt->bind_param("sssssssssss", $materialname,$mname,$model,$serial1,$quantity,$work,$cname,$date,$description1,$fromloc,$toloc);
		$execval = $stmt->execute();
	
	    echo " Material Collected .........";
  delete_data($conn, $serial1);
}
// delete data query
function delete_data($conn, $serial1){
   
    $query="DELETE from room WHERE serial1='$serial1'";
    $exec= mysqli_query($conn,$query);
    if($exec){
      echo "hi";
    }else{
        $msg= "Error: " . $query . "<br>" . mysqli_error($conn);
      echo $msg;
    }
}
?>
</body>
</html>

