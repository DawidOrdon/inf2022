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
    <label for="imie">imie</label><input type="text" name="imie" id="imie"><br />
    <label for="wiek">wiek</label><input type="number" name="wiek" id="wiek"><br />
    <label for="regulamin">regulamin</label><input type="checkbox" name="regulamin" id="regulamin"><br />
    <input type="submit" value="przeslij">
</form>
<?php
$error=0;
    if(!empty($_POST['imie'])&&strlen($_POST['imie'])>2){
        $imie=$_POST['imie'];
    }else{
        $error=1;
    }
    if(!empty($_POST['wiek'])&&is_numeric($_POST['wiek'])&&$_POST['wiek']>0){
        $wiek=$_POST['wiek'];
    }else{
        $error=1;
    }

    if(isset($_POST['regulamin'])){
        $regulamin=true;
    }else{
        $regulamin=false;
    }

    if($error==0){
        echo "imie: $imie<br />";
        echo "wiek: $wiek<br />";
        echo "czy zaakceptował regulamin:";
        if($regulamin){
            echo "tak";
        }else{
            echo "nie";
        }
    }else{
        echo"podaj prawidłowe dane";
    }
?>
</body>
</html>