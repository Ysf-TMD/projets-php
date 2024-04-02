<?php
require "db.php";
if(isset($_POST["submit"])){
    $login = $_POST["login"];
    $mdp = $_POST["password"];
    if(!empty($login)&&!empty($mdp)){
        $select  = $db->prepare("SELECT * FROM users Where login = ? and password = ?" );
        $select->execute([$login,$mdp]);
        $data=$select->fetch(PDO::FETCH_ASSOC);
        if($data){
            session_start() ;

            $_SESSION["user_name"] = $data["user_name"];
            $_SESSION["login"]=$data["login"];
            $_SESSION["password"]=$data["password"];
            header("location:../pages/dashboard.php");
        }
    }else{
        header("location:../index.php");
    }
}