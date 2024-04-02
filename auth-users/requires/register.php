
<?php
require "../requires/db.php";
if(isset($_POST["submit"]))
{
   $user_name = $_POST["name"];
   $login = $_POST["login"];
   $password = $_POST["password"];
   if(!empty("$user_name")&&!empty("$login")&&!empty("$password")){
       $insert = $db->prepare("INSERT INTO users(user_name , login , password) VALUES (?,?,?) ");
       $insert->execute([$user_name , $login , $password]);
       $data = $insert->rowCount();
       if($data){
           header("location:../index.php");
       }
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
    <title>SysAuth</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<?php include "../includes/header.php"?>
<div class="bg-gradient bg-black vh-100 text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="w-100 justify-content-center">
                <form action="" method="post" class="form text-uppercase fw-bold w-25 mx-auto ">
                    <div class="h4 text-center fw-bold text-uppercase mt-5"> Register </div>
                    <div class="py-3">
                        <label for="">user name  </label>
                        <input type="text"  name="name" id="" class="form-control" placeholder="user name  ...">
                    </div>
                    <div class="py-3">
                        <label for="">user login  </label>
                        <input type="text"  name="login" id="" class="form-control" placeholder="login ...  ">
                    </div>
                    <div class="py-3">
                        <label for="">mot de passe  </label>
                        <input type="password" required name="password" id="" class="form-control" placeholder="enter password ">
                    </div>
                    <div class="py-3 text-center">
                        <input type="submit" name="submit" value="sign in " id="" class="btn btn-sm w-100 text-white bg-primary">
                    </div>
                    <div class="py-1 text-end text-muted">
                        <a href="../index.php" class="text-white nav-link">Sign in </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
