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
    <input type="number" name="numer" id="">
    <input type="submit" value="oblicz">
</form>
    <?php
        if(!empty($_POST['numer'])&&is_numeric($_POST['numer'])&&$_POST['numer']>0){
            $fib=[1,1];
            for($i=2;$i<$_POST['numer'];$i++){
                $fib[]=$fib[$i-1]+$fib[$i-2];
            }
            echo "<pre>";
            print_r($fib);
            echo"</pre>";
            echo $fib[$_POST['numer']-1];
        }
    ?>
</body>
</html>