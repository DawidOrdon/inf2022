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
<a href="./index.php"><button>nowe ciasteczko</button></a>
<form action="" method="post">
    <label for="nazwa">Nazwa ciasteczka</label><input type="text" name="nazwa" id="nazwa">
    <input type="submit" value="sprawdz">
</form>
<?php
if(!empty($_POST['nazwa'])){
    if(isset($_COOKIE[$_POST['nazwa']])){
        echo "ciastko istnieje";
    }else{
        echo "ktos zjadl ciastko";
    }
}

?>
</body>
</html>