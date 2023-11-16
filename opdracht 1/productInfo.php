<?php
    $error = "";
    if (isset($_GET['id'])){
        require_once('classes/product.php');
        $product = new Product();
        $p = $product->productInfo($_GET['id']);

        if(isset($_POST['update'])){
            $error = $product->updateProduct($_POST, $_GET['id']);
            echo "<meta http-equiv='refresh' content='0'>";
        }

    }else{
        header('location: gebruikers.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="display: grid; grid-template-columns: 50vw 20vw; background-color:antiquewhite;">
    <?php require('nav.php')?>

    <section id="userinfo" style="margin-top: 5vh; padding: 10%; display: flex;">
        
        <article class="list">
            <h1>id</h1>
            <h1>naam</h1>
            <h1>text</h1>
            <h1>prijs</h1>
            <h1>aantal</h1>
        </article>
        <article class="userinfo">
            <h1><?php echo $_GET['id']?></h1>
            <h1><?php echo $p->naam?></h1>
            <h1><?php echo $p->beschrijving?></h1>
            <h1><?php echo $p->prijs?></h1>
            <h1><?php echo $p->aantal?></h1>
        </article>
    </section>
    <form method="post" style="margin-top: 10vh; background-color: navy; padding: 10%; border-radius:20px;">
        <input type="text" name="naam" value="<?= $p->naam?>"><br><br>
        <textarea type="text" name="text" style="height: 100px;"><?= $p->beschrijving?></textarea><br><br>
        <input type="text" name="prijs" value="<?= $p->prijs?>"><br><br>
        <input type="text" name="aantal" value="<?= $p->aantal?>"><br><br>
        <input type="submit" value="update" name="update">
        <?php echo '<p style="color:white;">'.$error.'</p>';?>
    </form>

</body>
</html>
<style>
    article{
        border: 1px solid black;
    }
    .list h1{
        width: 100px;
    }
    .userinfo h1{
        width: 200px;
    }
</style>