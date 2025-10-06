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
    $liczba=2134;
    $dzielniki1=[];
    for($i=1;$i<=$liczba;$i++){
        if($liczba%$i==0){
            $dzielniki1[]= $i;
        }
    }
    $liczba2=518562;
    $dzielniki2=[];
    for($i=1;$i<=$liczba2;$i++){
        if($liczba2%$i==0){
            $dzielniki2[]= $i;
        }
    }
    echo "<pre>";
    print_r($dzielniki1);
    print_r($dzielniki2);
    echo "</pre>";

    $index1=count($dzielniki1)-1;
    $index2=count($dzielniki2)-1;
    
?>
</body>
</html>