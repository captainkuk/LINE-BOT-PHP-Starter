
<?php

$host = "us-cdbr-iron-east-05.cleardb.net";
$username = "b0188175a00d8f";
$password = "6c89afbb";
mysql_connect($host,$username,$password);
	
if($objConnect)
{
	echo "MySQL Connected";
}
else
{
	echo "MySQL Connect Failed : Error : ".mysql_error();
}

mysql_close($objConnect);

echo "55555";
?>

