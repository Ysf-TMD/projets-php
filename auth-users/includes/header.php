<nav class = "nav w-100 justify-content-evenly d-flex py-2  bg-black text-white">
<?php
session_start();
?>
    <?php
    if(isset($_SESSION["user_name"])):
    ?>
        <a href="" class="nav-link text-white active"><?= $_SESSION["user_name"]?></a>
        <a href="" class="nav-link text-white"><?= $_SESSION["login"]?></a>
        <a href="../requires/logout.php" class="nav-link text-white">Logout</a>

    <?php else : ?>
        <a href="./index.php" class="nav-link text-white">login</a>

    <?php endif ?>

</nav>