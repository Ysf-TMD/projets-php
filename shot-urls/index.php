<?php require "config.php"?>
<?php

$select = $conn->query("SELECT * FROM urls ");
$select->execute();
$rows = $select->fetchAll(PDO::FETCH_OBJ);
if(isset($_POST["submit"])){
    if($_POST["url"]==""){
        echo 'the input is empty';
    }else{
        $url = $_POST['url'];
        $insert = $conn->prepare("INSERT INTO urls (url) VALUES (:url)");
        $insert->execute([
            ":url"=>$url
        ]);
        header("location:index.php");
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <form action="" method="post">
        <input type="text" name="url" id="" placeholder="Entrer URL ">
        <input type="submit" value="insert" name="submit">
    </form>
    <hr>
    <table border="1" id="refresh">
        <thead>
        <tr>
            <th>id</th>
            <th>short</th>
            <th>click</th>
        </tr>
        </thead>
        <body>
        <?php foreach ($rows as $row) {?>

        <tr>
            <td><?= $row->url ;?></td>
            <td><a href="http://localhost/newProject/urlsDirections/?id=<?= $row->id?>" target="_blank"><?= md5($row->url)?></a></td>
            <td><?= $row->clicks ;?></td>
        </tr>
        <?php }?>

        </body>

    </table>
</div>
</body>
</html>
