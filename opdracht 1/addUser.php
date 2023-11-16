<?php
    $error = "";
    $href = "login.php";
    $text = "log in";
    if (isset($_POST['create'])) {
        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['adres']) && !empty($_POST['postcode']) && !empty($_POST['telefoon'])){
            require_once('classes/user.php');
            $user2 = new User();
            $error = $user2->addUser($_POST);
            if($error = "user added"){
                sleep(2);
                header('location: login.php');
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

    <section id="navbalk">
        <section>
            <a href="gebruikers.php" class="pages"><h1>users</h1></a>
            <a href="product.php" class="pages"><h1>products</h1></a>
        </section>
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
            width: 8vw;
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
            margin-top: 75vh;
        }

        label{
            color: white;
        }
    </style>

    <form method="post" style=" margin-left: 15vw; margin-top: 5vh; background-color: navy; padding: 20%; border-radius:20px;">
        <input type="text" name="username" placeholder="username*"><br><br>
        <input type="password" name="password" placeholder="password*"><br><br>
        <input type="text" name="voornaam" placeholder="voornaam"><br><br>
        <input type="text" name="tv" placeholder="tussenvoegsel"><br><br>
        <input type="text" name="achternaam" placeholder="achternaam"><br><br>
        <input type="text" name="adres" placeholder="adres*"><br><br>
        <input type="text" name="postcode" placeholder="postcode*"><br><br>
        <input type="text" name="telefoon" placeholder="telefoon*"><br><br>
        <input type="submit" value="create" name="create">
        <?php
            echo '<p style="color:white;">'.$error.'</p>';
        ?>
    </form>
</body>
</html>