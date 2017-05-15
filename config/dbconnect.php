<?php      
$dbhost = 'localhost';   
$dbuser = 'root';   
$dbpass = '';   
$conn = mysql_connect($dbhost, $dbuser, $dbpass);      
if(! $conn ) {      
    die('Could not connect: ' . mysql_error());   
}      
echo 'Connected successfully';   
$sql = "CREATE TABLE `clothdb`.`product` 
        ( `id_product` INT NOT NULL AUTO_INCREMENT , 
        `product_name` VARCHAR(50) NOT NULL , 
        `product_description` TEXT NOT NULL , 
        `stock` INT NOT NULL , 
        `price` INT NOT NULL , 
        `created_at` TIMESTAMP NOT NULL , 
        PRIMARY KEY (`id_product`)) ENGINE = InnoDB;";
mysql_select_db('clothdb');
$retval = mysql_query( $sql, $conn );      
if(! $retval ) {      
    die('Could not create table: ' . mysql_error());   
}      
echo "Table product created successfully\n"; 
mysql_close($conn); 
?>