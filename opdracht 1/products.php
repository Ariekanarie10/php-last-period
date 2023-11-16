<?php
    $error = "";

    require_once('classes/product.php');
    $p = new Product();
    $product = $p->showProduct();
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

    <section style="background-color: lightgrey; display:flex; flex-direction:column;">
        <?php
            foreach($product as $p){
        ?>
            <form method="get" style="display:grid; grid-template-columns: repeat(4, calc(100vw/4)); border-bottom:2px solid black; height: 10vh">
                <h1><?php echo $p->naam  ?></h1>
                <h1><?php echo '€'.$p->prijs ?></h1>
                <a href="productInfo.php?id=<?= $p->id?>" style="color: black;">meer info</a>
                <a href="deleteProduct.php?id=<?= $p->id?>" style="color:black; background-color:ghostwhite; border: 1px solid black; padding:1%" id="delete"> delete account</a>
            </form>
        <?php
            }
        ?>
    </section>
    <a href="addProduct.php" style="position: absolute; margin-left:95vw; margin-top:90vh; background-color:navy; border-radius:100%; padding:10px; font-size:xx-large; width:2.5vw; text-align: center; text-decoration: none;">+</a>
</body>
</html>