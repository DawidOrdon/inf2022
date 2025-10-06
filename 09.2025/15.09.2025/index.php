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
    <input type="text" name="l1" id="">
    <input type="number" name="l2" id=""><input type="number" name="l3" id="">
</form>
<?php
    if(isset($_POST['l1']) && !empty($_POST['l2'])&& is_numeric($_POST['l2'])){
        if(strlen($_POST['l1'])%$_POST['l2']==0) {
            echo "frytki";
        }else{
            if(!empty($_POST['l3'])&&is_numeric($_POST['l3'])){
                echo $_POST['l3']*$_POST['l3'];
            }
        }
    }

if(!empty($_POST['l1'])&& is_numeric($_POST['l2']) && !empty($_POST['l2'])&& is_numeric($_POST['l2'])){
    if($_POST['l1']%$_POST['l2']==0) {
        echo "frytki";
    }else{
        if(!empty($_POST['l3'])&&is_numeric($_POST['l3'])){
            echo strlen($_POST['l3']);
        }
    }
}
?>
</body>
</html>