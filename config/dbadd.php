<?php      
$dbhost = 'localhost';   
$dbuser = 'root';   
$dbpass = '';   
$conn = mysql_connect($dbhost, $dbuser, $dbpass);      
if(! $conn ) {      
    die('Could not connect: ' . mysql_error());   
} 
$sql = "INSERT INTO `dbcloth`.`product_category` 
        (`id_product_category`, `category_name`, `category_detail`) 
        VALUES ('1', 'Kaos', 'Kaos dapat memiliki berbagai macam desain, warna, dan ukuran')";
mysql_select_db('dbcloth');
$retval = mysql_query( $sql, $conn );      
if(! $retval ) {      
    die('Could not create table: ' . mysql_error());   
}      
echo "Entered data successfully\n";
mysql_close($conn); 
?>