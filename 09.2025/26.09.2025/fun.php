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
    <label for="imie">imie</label><input type="text" name="imie" id="imie">
    <label for="wiek">wiek</label><input type="number" name="wiek" id="wiek">
    <label for="wiek2">wiek2</label><input type="number" name="wiek2" id="wiek2">
    <input type="submit" value="przeslij">
</form>
    <?php
        function validate_number($name, $limit=0){
            if(!empty($_POST[$name])&&is_numeric($_POST[$name])&&$_POST[$name]>$limit){
                echo " zmienna jest dobra";
                return true;
            }else{
                echo"błedna zmienna";
                return false;
            }
        }

        validate_number("wiek",18);
        validate_number("wiek2");

        if(validate_number("wiek")){

        }
    ?>
</body>
</html>