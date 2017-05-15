<?php
// $dbhost = 'localhost';   
// $dbuser = 'root';   
// $dbpass = '';      
// $conn = mysql_connect($dbhost, $dbuser, $dbpass);      
// if(! $conn ) {      
//     die('Could not connect: ' . mysql_error());   
// }
// $table_name = "product_category";   
// $backup_file  = "localhost/gravicloth/config/product_category.sql";
// $sql = "LOAD DATA INFILE '$backup_file' INTO TABLE $table_name";      
// mysql_select_db('dbcloth');   
// $retval = mysql_query( $sql, $conn );      
// if(! $retval ) {      
//     die('Could not load data : ' . mysql_error());   
// }   
// echo "Loaded  data successfully\n";      
// mysql_close($conn); 
?>

<?php   
$dbhost = 'localhost';   
$dbuser = 'root';   
$dbpass = '';
$backup_file = $dbname . date("Y-m-d-H-i-s") . '.gz';   
$command = "mysqldump --opt -h $dbhost -u $dbuser -p $dbpass ". "test_db | gzip > $backup_file";      
system($command); 
?>