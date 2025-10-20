<?php
session_start();
if(!isset($_SESSION['baza'])){
    $_SESSION['baza'] = "mysql";
}
if(!empty($_POST['baza'])){
    $_SESSION['baza'] = $_POST['baza'];
}
if(!empty($_POST['zapytanie'])){
    $_SESSION['zapytanie'] = $_POST['zapytanie'];
}
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            display: flex;
            flex-direction: row;
            align-content: center;
            justify-content: center;
            align-items: center;
            background-color: rgba(184, 211, 255, 0.19);
        }
        h1{
            text-align: center;
            font-family: Arial;
        }

        .bazy{
            padding: 5px;
            border-color: #95a5a6;
            border-width: 2px;
            border-style: double;
            column-gap: 4px;
        }
        .guz{
            padding: 15px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-content: center;
        }
        button{

            padding: 10px;
            background-color: rgba(69, 237, 58, 0.53);
            cursor: crosshair;
            border-radius: 15px;

        }
        .final{
            font-family: Arial;
            font-size: 25px;
            padding: 10px;
            color: #3763b5;
        }
        .six{
            justify-content: right;
            padding: 10px;
            font-size: 20px;
            border-width: 3px;
            border-style: solid;
            border-color: #333333;
            background-color: rgba(149, 165, 166, 0.46);
            border-radius: 6px;

        }
        p{
            border-style: dashed;
            border-width: 1px;
            font-size: 25px;
        }

    </style>
</head>
<body>
<div class="forms">
    <h1><u>Wybierator Baz Danych</u></h1>
<form action="" method="post">
<div class="bazy">
    <?php
    $db = new mysqli('localhost', 'root', '',$_SESSION['baza']);
    $sql = 'show databases';
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->get_result();
    while($row = $result->fetch_object()){
        echo "<tr><td><input type='radio' name='baza' id='' value='{$row->Database}'></td><td>{$row->Database}</td></tr><br/>";
    }
    ?>
</div>
    <div class="guz">
    <table>
        <tr>
            <td colspan="3">
                <button>Wybierz baze danych</button>
            </td>
        </tr>
    </table>
    </div>
</form>
</div>
<div class="final">
<?php
if(isset($_SESSION['baza'])){
    echo"Wybrales baze: "."<b><u>".$_SESSION['baza']."</u></b><br/><br/>";
    echo "<div class='six'><p>Tabele znajdujace sie w bazie danych:</p><br/>";
    $sql='show tables';
    $query = $db->prepare($sql);
    $query->execute();
    $result=$query->get_result();
    if($result->num_rows==0){
        echo"<tr><td>W danej bazie nie ma tabel!</td></tr>";
    }
    while ($row=$result->fetch_array()){
        echo"<tr><td>$row[0]</td></tr><br/>";
    }
    echo"</div>";
}
?>
</div>
</body>
</html>