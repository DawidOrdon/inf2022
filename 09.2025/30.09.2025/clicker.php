<?php
    if(!isset($_COOKIE['wynik'])){
        setcookie('wynik',0,time()+3600);
    }
    if(!isset($_COOKIE['mnoznik'])){
        setcookie('mnoznik',1,time()+3600);
    }

    if(!empty($_GET['click'])&&$_GET['click']==1){
        setcookie('wynik',$_COOKIE['wynik']+$_COOKIE['mnoznik'],time()+3600);
    }

    if(!empty($_GET['cena'])&&!empty($_GET['mnoznik'])&&is_numeric($_GET['mnoznik'])&&is_numeric($_GET['cena'])&&$_GET['mnoznik']>0&&$_GET['cena']>0){
        if($_COOKIE['wynik']>=$_GET['cena']){
            setcookie('wynik',$_COOKIE['wynik']-$_GET['cena'],time()+3600);
            setcookie('mnoznik',$_COOKIE['mnoznik']+$_GET['mnoznik'],time()+3600);
        }

    }
    $img = ['img.png','cookie.png','cookie2.png','cookie3.png','cookie4.png'];
    if($_COOKIE['mnoznik']>100&&$_COOKIE['mnoznik']<1000){
        $zdjecie=$img[1];
    }else if($_COOKIE['mnoznik']>1001&&$_COOKIE['mnoznik']<10000){
        $zdjecie=$img[2];
    }else if($_COOKIE['mnoznik']>10001&&$_COOKIE['mnoznik']<100000){
        $zdjecie=$img[3];
    }else if($_COOKIE['mnoznik']>100001&&$_COOKIE['mnoznik']<1000000){
        $zdjecie=$img[4];
    }else{
        $zdjecie=$img[0];
    }
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>coockie clicker</title>
    <style>
        section{
            width: 50%;
            float: left;
        }
        img{
            width: 100%;
        }
        .item{
            width: 100%;
            padding: 4px;
            text-align: center;
        }
    </style>
</head>
<body>
<section>
    <a href="?click=1"><img src="./img/<?php echo $zdjecie?>" alt=""></a>
</section>
<section>
    <div class="item">Wynik: <?php if(isset($_COOKIE['wynik'])){
                                    echo $_COOKIE['wynik'];
                                } ?></div>
    <div class="item">Aktualny mnożnik: <?php if(isset($_COOKIE['mnoznik'])){
                                            echo $_COOKIE['mnoznik'];
                                        }?></div>
    <div class="item"><a href="?cena=20&mnoznik=1">cena 20 mnożnik + 1</a></div>
    <div class="item"><a href="?cena=50&mnoznik=2">cena 50 mnożnik + 2</a></div>
    <div class="item"><a href="?cena=200&mnoznik=5">cena 200 mnożnik + 5</a></div>
    <div class="item"><a href="?cena=1000&mnoznik=10">cena 1000 mnożnik + 10</a></div>
    <div class="item"><a href="?cena=5000&mnoznik=25">cena 5000 mnożnik + 25</a></div>
    <div class="item"><a href="?cena=15000&mnoznik=50">cena 15000 mnożnik + 50</a></div>
    <div class="item"><a href="?cena=50000&mnoznik=100">cena 50000 mnożnik + 100</a></div>
</section>
</body>
</html>