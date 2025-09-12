<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>stale</title>
</head>
<body>
<form action="./index.php?id=">
    <label for="fig1">kw</label><input type="radio" name="fig" value="1" id="fig1">
    <label for="fig2">tr1</label><input type="radio" name="fig" value="2" id="fig2">
    <label for="fig3">tr2</label><input type="radio" name="fig" value="3" id="fig3">
    <label for="fig4">cos</label><input type="radio" name="fig" value="4" id="fig4">
    <input type="number" name="" id="">
    <input type="number" name="" id="">
    <input type="number" name="" id="">
    <input type="number" name="" id="">
    <input type="submit" value="przeslij">
</form>
<?php
echo"<input type='hidden' name='fig' value='1'>";
$zmienn = 43;
echo $zmienn . "<br />";
$zmienn = 2;
echo $zmienn . "<br />";
define('stala', 3.14);
echo stala . "<br />";

$zmienn = $zmienn + 3;
$zmienn *= 3;


$zmienna = 0.4;
?>
</body>
</html>