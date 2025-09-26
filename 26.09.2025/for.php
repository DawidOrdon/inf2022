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
    <label for="ciag">Podaj wyraz ciagu</label><input type="number" name="ciag" id="ciag">
    <input type="submit" value="oblicz">
</form>
<?php
    if(!empty($_POST['ciag'])&&is_numeric($_POST['ciag'])&&$_POST['ciag']>0){
        $stop = $_POST['ciag'];
        $ciag=[1,2];
        for($i=2;$i<$stop;$i++){
            $ciag[]=$ciag[$i-1]*2;
        }
        echo $ciag[$stop-1];
        echo"<pre>";
        print_r($ciag);
        echo"</pre>";

    }


//        for($i=0;$i<10;$i++){
//            echo"cos<br />";
//        }

//        while(true){
//
//        }

//        do{
//
//        }while(true);

//        $arr=[1,2,3,4,5,6,8,7];
//        foreach($arr as $key=>$i){
//            echo "klucz ".$key." wartość ".$i."<br>";
//        }

    ?>
</body>
</html>