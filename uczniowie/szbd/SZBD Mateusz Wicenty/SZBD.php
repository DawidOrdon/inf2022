<?php
session_start();
if(!empty($_POST['baza'])){
    $_SESSION['baza'] = $_POST['baza'];
}
?>

<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>System Zarządzania Bazą Danych</title>
    <style>

        h1{

            text-align: center;
            font-family: arial, sans-serif;
        }

        .database-btn{
            font-family: arial, sans-serif;
            cursor: pointer;
            position: relative;
            left: 46%;
            height: 2vw;
            width: 8vw;
            margin-top: 1.5vw;
            border-radius: 2vw;
            border: 0.1vw solid black;
            background-color: greenyellow;
            transition: 0.2s all;
        }

        .database-btn:hover{

            scale: (1.1);
            background-color: rgba(0, 0, 0, 0);
        }



        .data-list {

            display: flex;
            font-family: arial, sans-serif;
            gap: 4vw;
            margin-top: 2vw;
            margin-left: 9vw;

        }


        .data-list-b input[type="radio"]{

            text-align: center;
            height: 1vw;
            width: 1vw;
            cursor: pointer;
        }

        .data-list-tables{

            font-family: arial, sans-serif;
            gap: 4vw;
            margin-top: 2vw;
            margin-left: 9vw;


        }

        .data-list-tables-t{

            color: black;
            font-weight: bold;
            margin-top: 0.5vw;

        }

        .data-list-query{
            font-family: arial, sans-serif;
            gap: 4vw;
            margin-top: 2vw;
            margin-left: 21.5vw;
        }

        .data-list-query tr{
            margin-left: 1vw;

        }

        .all{

            display: flex;


        }
        .query-btn{
            font-family: arial, sans-serif;
            cursor: pointer;
            position: relative;
            height: 1.5vw;
            width: 6vw;
            margin-top: 1.5vw;
            border-radius: 1vw;
            border: 0.1vw solid black;
            background-color: greenyellow;
            transition: 0.1s all;
        }

        .query-btn:hover{

            scale: (1.1);
            background-color: rgba(0, 0, 0, 0);
        }

        tr{

            margin: 1vw;
        }

    </style>
</head>
<body>

<h1>System Zarządzania Bazą Danych</h1>

<form action="" method="POST">
<button type="submit" class="database-btn">Wybierz bazę</button> <br>

<?php

        $db=new mysqli("localhost","root","","mysql");
        $sql='show databases';
        $query=$db->prepare($sql);
        $query->execute();
        $result=$query->get_result();

        echo "<div class='data-list'>";
        while($row=$result->fetch_object()){
            echo "<div class='data-list-b'>";
            echo "<input type='radio' name='baza' value='{$row->Database}'> <br> <span>{$row->Database}</span>"."<br>";
            echo "</div>";
        }

        echo "</div>";

        echo "<div class='all'>";

                if(isset($_SESSION['baza'])) {
                    echo "<br>";
                    echo "<div class='data-list-tables'>";
                    echo "<h3> DOSTĘPNE TABELE</h3>";
                    $db = new mysqli("localhost", "root", "", $_SESSION['baza']);
                    $sql = 'show tables';
                    $query = $db->prepare($sql);
                    $query->execute();
                    $result = $query->get_result();
                    while($row=$result->fetch_array()){
                        echo "<div class='data-list-tables-t'>";
                        echo $row[0]."<br>";
                        echo "</div>";
                    }
                    echo "</div>";
                }


                            echo"<div class='data-list-query'>";
                            echo "<h3> Wprowadź zapytanie do wybranej bazy</h3>";

                            echo"<form method='POST' action = ''>";
                            echo"<textarea name='Zapytanie'></textarea> <br>";
                            echo"<button type='submit' class='query-btn'> Wyślij </button>";
                            echo"<br><br>";

                                    if(!empty($_POST['Zapytanie'])) {
                                        $zap = $_POST['Zapytanie'];
                                        $db = new mysqli("localhost", "root", "", $_SESSION['baza']);
                                        $sql = $zap;
                                        $query = $db->prepare($sql);
                                        $query->execute();
                                        $result = $query->get_result();
                                        while ($row = $result->fetch_assoc()) {
                                            echo"<table>";
                                            foreach ($row as $key => $value) {

                                                echo "<th> $value </th>";

                                            }
                                            echo "</table>";
                                        }
                                    }

                                echo "</div>";
                                echo "</form>";
        echo "</div>";

?>

</form>
</body>
</html>