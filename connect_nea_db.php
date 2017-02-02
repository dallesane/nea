<?php
// define ('URL', 'http://localhost:8888/safeway/safe/sim_details_crud/');
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($localhost, $root);
if(! $conn )
	{
	  die('Could not connect: ' . mysql_error());
	}
// echo 'Connected successfully';
	

$db_selected= mysql_select_db ('safeway_nea', $conn);

if (!$db_selected){
	echo mysql_error();
}

?>