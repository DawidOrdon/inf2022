<?php
session_start();
include_once('BreedingPlace.php');
    if(!empty($_POST['name'])){
        $_SESSION['breeding_place']= new BreedingPlace($_POST['name']);
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
<form action="" method="post">
    <label for="name">podaj nazwe hodowli</label><input type="text" name="name" id="name">
    <input type="submit" value="dodaj hodowle">
</form>
</body>
</html>