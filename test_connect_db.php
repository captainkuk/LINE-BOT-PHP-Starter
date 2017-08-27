<?php
include "condb_mysql.php";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}else{
	echo "Conect Success! ";
}
//mysqli_close($objConnect);
?>
