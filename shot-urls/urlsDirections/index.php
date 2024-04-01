<?php
require "../config.php";

?>
<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $select = $conn->query("SELECT * FROM urls WHERE id = $id");
    $select->execute();
    $data = $select->fetch(PDO::FETCH_OBJ);


    $click = $data->clicks +1 ;
    $update = $conn->prepare("UPDATE urls SET clicks = :clicks Where id =$id ");
    $update->execute([
        ":clicks"=> $click
    ]);

    header( "location: https://www.".$data->url.".com");
}