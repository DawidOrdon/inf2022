<?php
include_once ('./Bird.php');
session_start();
    if(!empty($_POST['name'])&&!empty($_POST['weight'])&&is_numeric($_POST['weight'])){
        $bird=new Bird($_POST['can_fly'],$_POST['name'],$_POST['weight']);
        $_SESSION['bird']=$bird;
        print_r($_SESSION['bird']);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="./index.php">sprawdz</a>
<form action="" method="post">
    <label for="name">podaj nazwe ptaka</label><input type="text" name="name" id="name">
    <label for="weight">podaj mase ptaka</label><input type="number" name="weight" id="weight">
    <label for="can_fly">czy lata</label><input type="checkbox" name="can_fly" id="can_fly">
    <input type="submit" value="dodaj ptaka">
</form>
</body>
</html>
