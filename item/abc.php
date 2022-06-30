<?php 
     $servername="localhost";
     $username="root";
     $password="";
     $database="material";

     $conn=new mysqli($servername,$username,$password,$database);
     $sql="SELECT materialname, SUM(qauntity) FROM data GROUP BY materialname";
     $result=$conn->query($sql);
     while($row=mysqli_fetch_array($result)){
        echo "Total".$row['materialname']." = ". $row['SUM(qauntity)'];
        echo "<br/>";
     }
     $conn->close();
     ?>
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