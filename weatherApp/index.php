<?php
$fullWeather ="";
if(isset($_POST["submit"]))
{
    if($_POST["city"]==""){
        echo "city empty ";
    }else{
        $city = $_POST["city"];
        $data = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=0a13ccd5e6807378ad6edf65b82d3387");
        $weather = json_decode($data,true);
        //print_r( $weather["cod"]);
        $tempInCel = intval($weather["main"]["temp"]- 273);
        $fullWeather = "The Weather in ".$city." is ".$weather["weather"][0]["main"]." and the temperature is ".$tempInCel ;
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
    <div class="container">
        <form action="" method="post">
            <input type="text" name="city" id="" placeholder="enter city">
            <input type="submit" value="submit" name="submit">
        </form>
        <?php if($fullWeather)  : ?>
        <div>
            <?= $fullWeather?>
        </div>
        <?php endif?>
    </div>
</div>
</body>
</html>