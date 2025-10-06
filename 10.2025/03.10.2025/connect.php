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
    $db = new mysqli('localhost', 'root', '', 'inf2022');

    $sql="SELECT * FROM users";
    $query=$db->prepare($sql);
    $query->execute();
    $result=$query->get_result();
    print_r($result);
    while($row=$result->fetch_object()){
        echo "$row->first_name $row->last_name<br />";
    }



    $db->close();
?>
</body>
</html>