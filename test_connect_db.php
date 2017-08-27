<?php
include "connect_db";
// Check connection
if (!$con){
	die("Connection failed:" . mysqli_connect_error());
}

$sql = "select col1,col2,col3 from tbl1";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		echo "value1 : => ".$row["col1"]." ,value2 : => ".$row["col2"].
		" ,value3 : => ".$row["col3"];
	}
}else{
	echo "no result!";
}

mysqli_close($con);
?>
