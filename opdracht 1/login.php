<?php 
$check = "";
$error = "";
$href = "login.php";
$text = "log in";
if (isset($_POST['submit'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])){
        require_once('classes/User.php');
        $user = new User();
        $check = $user->login($_POST);
        if($check = false){
            $error = "onjuiste gegevens";
        }else{
            session_start();
            $_SESSION['ingelogd'] = true;
            header('location: gebruikers.php');
            $href = "loguit.php";
            $text = "log uit";
        }
    }else{
        $error = "vul gegevens in";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style=" background-color:antiquewhite">

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

    <form method="post" style="position:absolute; width:30vw; margin-left:25vw;margin-top: 5vh; background-color: navy; padding: 3%; border-radius:20px;">
        <label for="username">username:</label><br>
        <input type="text" name="username" placeholder="Enter name"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" placeholder="Enter Password"><br><br>
        <input type="submit" value="Login" name="submit"><br><br>
        <a href="addUser.php"><h3>create account</h3></a>
        <?php 
        echo $error;
        ?>
    </form>

</body>
</html>
<style>
    label{
        color: white;
    }
</style>