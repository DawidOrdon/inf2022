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
<a href="./new_session.php"><button>new</button></a>
<a href="./end_session.php"><button>end</button></a>
<?php
    session_start();
    if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
    }else{
        echo "sesja nie istnieje";
    }
?>
</body>
</html>