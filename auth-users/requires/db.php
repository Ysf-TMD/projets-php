<?php
$dbName = "authsys";
$user = "root";
$password = "";
$host = "localhost";
try {
    $db = new PDO("mysql:host=$host;dbname=$dbName",$user , $password);

}
catch(PDOException $exception){
    echo $exception->getMessage() ;
}