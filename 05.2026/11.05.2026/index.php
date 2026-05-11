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
<img src="./img/1.jpg" alt="" title="1.jpg" width="200">

<div id="result"></div>
<?php
    for ($i=1; $i <= 12; $i++) {
        echo "<img src='./img/$i.png' title='$i' width='200'>";
    }
?>

<script>
    for (i=1;i<=12;i++){
        let img = document.createElement("img")
        img.src="./img/"+i+".png";
        img.title=i
        img.width="200"
        document.getElementById('result').appendChild(img)
    }
    for (i=1;i<=12;i++){
        document.getElementById('result').innerHTML+="<img src='./img/"+i+".png' title='"+i+"' width='200'>";
    }
</script>
</body>
</html>