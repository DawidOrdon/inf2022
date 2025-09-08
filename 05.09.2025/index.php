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
    <?php
    //if
        $zmienna=43;
        if($zmienna>=10){
            echo $zmienna.">10<br />";
        }
        if ($zmienna>=20){
            echo $zmienna.">20<br />";
        }
        if($zmienna>=30) {
            echo $zmienna . ">30<br />";
        }
        if($zmienna>=40){
            echo $zmienna. ">40<br />";
        }

        echo "<br /><br /><br /><br /><br />";

    //przelacz w odniesieniu do parametru w nawiasach
        $cos=9;
        switch ($cos) {
            case 1:{
                echo "1<br />";
                break;
            }
            case 2:{
                echo "2<br />";
                break;
            }
            case 3:{
                echo "3<br />";
                break;
            }
            case 4:{
                echo "4<br />";
                break;
            }
            default:{
                echo"inne";
                break;
            }
        }
    ?>
<!--    do przesylani danych dla php-->
    <form action="" method="post">
        <label for="name">imie</label><input type="number" name="name" id="name">
        <label for="regulamin">regulamin</label><input type="checkbox" name="regulamin" id="regulamin">
        <input type="submit" value="post">
    </form>
    <?php
//        jak w formie mamy method post to $_POST a jak get $_GET a w kwadratowych nawiasach name z inputa
    if(!empty($_POST["name"])){
        if(is_numeric($_POST["name"])&&$_POST["name"]>10){
            echo "liczba wieksza od 10";
        }else{
            echo "cos innego";
        }

    }else{
        echo "nic nie ma";
    }

    ?>
</body>
</html>