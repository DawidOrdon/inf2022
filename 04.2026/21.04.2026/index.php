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
    <input type="text" name="warunek" id="">
    <input type="radio" name="sql" value="1">query
    <input type="radio" name="sql" value="2">prepare
    <input type="submit" name='submit' value="test">
</form>
<?php
    if(isset($_POST['submit'])){
        $db = new mysqli('localhost', 'root', '', 'inf2022');
        if($_POST['sql'] == 1){
            $sql = "select count(*) as ile from users where first_name like '%{$_POST['warunek']}%'";
            echo $sql;
            $result = $db->query($sql);
            while($row = $result->fetch_assoc()){
                echo $row['ile'];
            }
        }else if ($_POST['sql'] == 2){
            $sql = "select count(*) as ile from users where first_name like ?";
            $stmt = $db->prepare($sql);
            $in="%{$_POST['warunek']}%";
            $stmt->bind_param('s', $in);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                echo $row['ile'];
            }

        }
    }
?>
</body>
</html>