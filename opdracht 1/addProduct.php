<?php
    $error = "";

    require_once('classes/product.php');
    if (isset($_POST['create'])) {
        if (!empty($_POST['naam']) && !empty($_POST['text']) && !empty($_POST['prijs']) && !empty($_POST['aantal'])){
            require_once('classes/product.php');
            $p = new Product();
            $error = $p->addProduct($_POST);
            if($error = "user added"){
                sleep(2);
                header('location: products.php');
            }
        }else{
            $error = "vul alles in";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <title>Document</title>
</head>

<body style="display: grid; grid-template-columns: 15vw 85vw; background-color: antiquewhite;">
    <?php require('nav.php');?>

    <form method="post" style=" margin-left: 15vw; margin-top: 5vh; background-color: navy; padding: 20%; border-radius:20px;">
        <input type="text" name="naam" placeholder="naam*"><br><br>
        <textarea type="password" name="text" placeholder="text*" style="height: 100px;"></textarea><br><br>
        <input type="text" name="prijs" placeholder="prijs*"><br><br>
        <input type="text" name="aantal" placeholder="aantal*"><br><br>
        <input type="submit" value="create" name="create">
        <?php
            echo '<p style="color:white;">'.$error.'</p>';
        ?>
    </form>
</body>
</html>