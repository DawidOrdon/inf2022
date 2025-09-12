<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for="l1">liczba 1</label><input type="number" name="l1" id="l1">
    <label for="l2">liczba 2</label><input type="number" name="l2" id="l2">
    <label for="wyb1">dodaj</label><input type="radio" name="wyb" id="wyb1" value="1">
    <label for="wyb2">odejmij</label><input type="radio" name="wyb" id="wyb2" value="2">
    <label for="wyb3">podziel</label><input type="radio" name="wyb" id="wyb3" value="3">
    <input type="submit" value="oblicz">
</form>

<?php
echo strlen($_POST['l1']);
$l1 = false;
$l2 = false;
if (!empty($_POST['l1']) && is_numeric($_POST['l1'])) {
    $l1 = $_POST['l1'];
}
if (!empty($_POST['l2']) && is_numeric($_POST['l2'])) {
    $l2 = $_POST['l2'];
}

if(isset($_POST['wyb'])){

    switch ($_POST['wyb']) {
        case 1:{
            if ($l1 && $l2) {
                echo "$l1 + $l2 = " . ($l1 + $l2);
            } else {
                echo "podaj dane";
            }
            break;
        }
        case 2:{
            if ($l1 && $l2) {
                echo "$l1 - $l2 = " . ($l1 - $l2);
            } else {
                echo "podaj dane";
            }
            break;
        }
        case 3:{
            if ($l1 && $l2) {
                echo "$l1 / $l2 = " . ($l1 / $l2);
            } else {
                echo "podaj dane";
            }
            break;
        }
        default:{
            echo"podaj prawidlowa wartosc";
        }
    }
}


//if ($l1 && $l2) {
//    echo "ok";
//} else {
//    echo "podaj dane";
//}
?>
</body>
</html>