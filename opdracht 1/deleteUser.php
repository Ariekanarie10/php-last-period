<?php
require_once('classes/user.php');
$user = new User();
$users = $user->deleteUser($_GET['id']);
header('location: gebruikers.php');
?>