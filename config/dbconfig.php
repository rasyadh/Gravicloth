<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbcloth";

mysql_connect($servername,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>