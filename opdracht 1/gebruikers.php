<?php
    $error = "";

    require_once('classes/user.php');
    $user = new User();
    $users = $user->showUsers();
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
            foreach($users as $user){
        ?>
            <form method="get" style="display:grid; grid-template-columns: repeat(3, calc(100vw/3)); border-bottom:2px solid black; height: 10vh">
                <h1><?php echo $user->voornaam; ?></h1>
                <a href="gebruiker.php?id=<?= $user->id?>" style="color: black;">meer info</a>
                <a href="deleteUser.php?id=<?= $user->id?>" style="color:black; background-color:ghostwhite; border: 1px solid black; padding:1%" id="delete"> delete account</a>
            </form>
        <?php
            }
        ?>
    </section>

</body>
</html>
