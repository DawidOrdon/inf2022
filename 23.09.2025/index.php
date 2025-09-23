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
    <input type="checkbox" name="owoce[]" value="1" id="">
    <input type="checkbox" name="owoce[]" value="2" id="">
    <input type="checkbox" name="owoce[]" value="3" id="">
    <input type="checkbox" name="owoce[]" value="4" id="">
    <input type="checkbox" name="owoce[]" value="5" id="">
    <input type="submit" value="przeslij">
</form>
<?php
    if(!empty($_POST['owoce'])&&is_array($_POST['owoce'])){
        echo "<pre>";
        print_r($_POST['owoce']);
        echo "</pre>";
        echo $_POST['owoce'][0];
    }

?>
</body>
</html>