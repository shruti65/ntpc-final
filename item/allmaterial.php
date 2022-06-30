<?php
	//database connection
	$connection = mysqli_connect('localhost', 'root', '', 'material');
?>

<html>
	<head>
		<title>Read All Data</title>
		<style>
      table, th, td {
  border:1px solid black;
  height: auto;
  width: auto;
  margin-left: 200px;
  margin-top: 50px;
}
h1{
    
    color: #00a087;
    
}

.logo{
position: absolute;
          
          right: 80px;
		  margin-top: 10px;
		  height: 0.7cm;
}
.print{
	margin-left: 800px;
    height: 0.8cm;
    width:1.5cm;
}
    </style>
	</head>
	<body>
        <h1>ALL Material Details <input class="logo" type="text" name="search" id="myInput" placeholder="search by material name..." onkeyup="searchfun()"> </h1>
		<form method="POST">
		<table id="myTable">
	<thead>
		<tr>
    <th>Material</th>
    <th>Material name</th>
    <th>Model/Make model</th>
    <th>Serial No.</th>
    <th>Quantity</th>
    <th>Working condition</th>
    <th>Purchase Date</th>
    <th>Description</th>
    <th>LFrom</th>
    <th>LTo</th>
	<th colspan=2>Operation</th>
	
		</tr>
	</thead>
	<?php
	//$serial1 = $_GET['serial1'];
	 $results = mysqli_query($connection, "SELECT * FROM data");
		  while ($row = mysqli_fetch_array($results)) { 
			$serial1=$row['serial1'];
			?>
		<tr>
			<td><?php echo $row['materialname']; ?></td>
			<td><?php echo $row['mname']; ?></td>
			<td><?php echo $row['model']; ?></td>
			<td><?php echo $row['serial1']; ?></td>
			<td><?php echo $row['quantity']; ?></td>
			<td><?php echo $row['work']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['description1']; ?></td>
            <td><?php echo $row['fromloc']; ?></td>
			<td><?php echo $row['toloc']; ?></td>
			<td><?php echo "<a href='edit.php?serial1=$row[serial1]'>DELETE</a>"?>
			<td><?php echo "<a href='update.php?serial1=$row[serial1]'>UPDATE</a>"?>
		
		</tr>
	<?php } ?>
	
	

</table>
<br>
<br>
<button class="print" onclick="window.print()">Print</button>
</form>
<script>
	const searchfun = () => {
		let filter =document.getElementById('myInput').value.toUpperCase();
		let myTable = document.getElementById('myTable');
		let tr = myTable.getElementsByTagName('tr');
		 for(var i=0 ; i<tr.length;i++)
		 {
			let td=tr[i].getElementsByTagName('td')[0];
			if(td)
			{
				let textvalue =td.textContent || td.innerHTML;
				if(textvalue.toUpperCase().indexOf(filter) >-1){
					tr[i].style.display ="";

				}
				else{
					tr[i].style.display="none";
				}
			}
		 }
	}
</script>

	</body>
</html>