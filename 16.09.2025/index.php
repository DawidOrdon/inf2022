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
    <input type="checkbox" name="in[]" value="1" id="">
    <input type="checkbox" name="in[]" value="2" id="">
    <input type="checkbox" name="in[]" value="3" id="">
    <input type="submit" value="">
</form>
<?php
$a = 5;
echo $a . "<br />";
echo ++$a . "<br />";
echo $a . "<br />";
echo $a++ . "<br />";
echo $a . "<br />";
echo "<br />";
echo "<br />";
$i=11;
while($i<=10){
    echo $i . "<br />";
    $i++;
}
echo "<br />";
echo "<br />";
$i=11;
do{
    echo $i . "<br />";
    $i++;
}while($i<=10);
echo "<br />";
echo "<br />";
for($i=0;$i<=10;$i++){
    echo $i . "<br />";
}
echo "<br />";
echo "<br />";
for($i=0;$i<=10;$i++){
    for($z=0;$z<=10;$z++){
        echo"X";
    }
    echo"<br />";
}

$arr=[1,4,2,[3,4,5],'frytki'=>'23'];
foreach ($arr as $key=>$z){
    if(is_array($z)){
        foreach ($z as $k=>$v){
            echo $k."=>". $v . "<br />";
        }
    }else{
        echo $key."=>". $z . "<br />";
    }


}
echo"<br />";echo"<br />";
if(!empty($_POST['in'])){
    print_r( $_POST['in']);
}
?>
</body>
</html>