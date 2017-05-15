<?php      
$dbhost = 'localhost';   
$dbuser = 'root';   
$dbpass = '';   
$conn = mysql_connect($dbhost, $dbuser, $dbpass);      
if(! $conn ) {      
    die('Could not connect: ' . mysql_error());   
} 
mysql_select_db('dbcloth');
$sql = "DROP TABLE temp";
$retval = mysql_query( $sql, $conn );      
if(! $retval ) {      
    die('Could not create table: ' . mysql_error());   
}      
echo "Table deleted successfully\n"; 
mysql_close($conn); 
?>