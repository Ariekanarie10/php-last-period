<?php
// $accountId = $_GET['id'];
$href = "";
$text = "";
session_start();
if($_SESSION['ingelogd'] != true){
    header('location: login.php');
    $href = "login.php";
    $text = "log in";
}else{
    $href = "loguit.php";
    $text = "log uit";
}
?>
<section id="navbalk">
    <a href="gebruikers.php" class="pages"><h1>users</h1></a>
    <a href="products.php" class="pages"><h1>products</h1></a>
    <a href="<?= $href?>"><h1 id="login"><?= $text?></h1></a>
</section>
<style>
    *{
        margin: auto;
        padding: auto;
    }
    #navbalk{
        position: absolute;
        background-color: navy;
        height: 100vh;
        width: 10vw;
    }
    a{
        text-decoration: none;
        color: white;
    }
    a:hover{
        text-decoration: underline antiquewhite;
    }
    .pages{
        padding: 5%;
        text-align: center;
    }
    #login{
        border-top: 3px solid white;
        border-bottom: 3px solid white;
        padding: 5%;
        text-align: center;
        margin-top: 70vh;
    }

    label{
        color: white;
    }
</style>