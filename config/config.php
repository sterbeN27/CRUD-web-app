<?php
$databaseHost='localhost';
$databaseName='apu';
$databaseUsername='root';
$databasePassword='';

// Host,username,password,dbname
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// uncomment untuk debug / check error
// if($mysqli){
// echo "aman";
// } else {
// echo "error";
// }
?>