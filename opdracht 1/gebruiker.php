<?php
    $error = "";
    if (isset($_GET['id'])){
        require_once('classes/user.php');
        $user = new User();
        $users = $user->Userinfo($_GET['id']);

        if(isset($_POST['update'])){
            $error = $user->updateUser($_POST, $_GET['id']);
            echo "<meta http-equiv='refresh' content='0'>";
        }

    }else{
        header('location: gebruikers.php');
    }


    $naam = "";
    if(!$users->tv){
        $naam = $users->voornaam." ".$users->achternaam;
    }else{
        $naam = $users->voornaam." ".$users->tv." ".$users->achternaam;
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
            <h1>adres</h1>
            <h1>postcode</h1>
            <h1>telefoon</h1>
        </article>
        <article class="userinfo">
            <h1><?php echo $_GET['id']?></h1>
            <h1><?php echo $naam?></h1>
            <h1><?php echo $users->adres?></h1>
            <h1><?php echo $users->postcode?></h1>
            <h1><?php echo $users->telefoon?></h1>
        </article>
    </section>
    <form method="post" style="margin-top: 10vh; background-color: navy; padding: 10%; border-radius:20px;">
        <input type="text" name="voornaam" value="<?= $users->voornaam?>"><br><br>
        <input type="text" name="tv" value="<?= $users->tv?>"><br><br>
        <input type="text" name="achternaam" value="<?= $users->achternaam?>"><br><br>
        <input type="text" name="adres" value="<?= $users->adres?>"><br><br>
        <input type="text" name="postcode" value="<?= $users->postcode?>"><br><br>
        <input type="text" name="telefoon" value="<?= $users->telefoon?>"><br><br>
        <input type="submit" value="update" name="update">
        <?php echo '<p style="color:white;">'.$error.'</p>';

        ?>    
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