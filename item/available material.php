<?php
	//database connection
	$connection = mysqli_connect('localhost', 'root', '', 'material');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>
          h1{
    color: #00a087;
}
.abc{
    position: fixed;
 
   
}
.print{
	margin-left: 800px;
    height: 0.8cm;
    width:1.5cm;
}

    </style>
</head>
<body>
    
<hr></hr>
<h1>
       Total Material
    </h1>
    <hr></hr>
    
     <?php $results = mysqli_query($connection, "SELECT materialname, SUM(quantity) FROM data GROUP BY materialname");
		  while ($row = mysqli_fetch_array($results)) { ?>
	<h2><?php	echo "Total  " .$row['materialname']." = ". $row['SUM(quantity)']; ?></h2>
    
  
	<?php } ?>
    
<br>
    <hr></hr>
    <h1> Available material in room</h1>
    <hr></hr>
    <br>
    <?php $results = mysqli_query($connection, "SELECT materialname, SUM(quantity) FROM room GROUP BY materialname");
		  while ($row = mysqli_fetch_array($results)) { ?>
	<h2><?php	echo "Total  " .$row['materialname']." = ". $row['SUM(quantity)']; ?></h2>
       
	<?php } ?>
    <br>
<br>
<button class="print" onclick="window.print()">Print</button>

          </body>
</html>
