<?php
try {
    $host = "localhost";
    $dbName = "short-urls";
    $user = "root";
    $mdp = "";
    $dbConnection = "mysql:host=$host;dbname=$dbName" ;
    $conn = new PDO($dbConnection , $user , $mdp) ;
    $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

}catch (PDOException $exception){
    echo "DB Erreur is "  . $exception->getMessage();
}