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
    <title>System zarządzania bazą danych</title>
    <style>
        .bazy, .tabele, .zapytanie, .wynik{
            float: left;
        }
    </style>
</head>
<body>
<div class="bazy">
    <table>
        <th colspan="2">Wybierz bazę:</th>
        <?php
            $db = new mysqli('localhost', 'root', '', $_SESSION['baza']);
            $sql = 'show databases';
            $query = $db -> prepare($sql);
            $query -> execute();
            $result = $query -> get_result();
            echo "<form action='' method='post'>";
            while($row = $result->fetch_object()){
                echo '<tr><td><input type="radio" name="baza" id="" value="'.$row->Database.'"></td><td>'.$row->Database.'</td></tr>';
            }
            echo '<tr><td  colspan="2"><input type="submit" value="Prześlij"></td></tr>';
            echo '</form>';
        ?>
    </table>
</div>

<div class="tabele">
    <table>
        <?php
            if(!empty($_SESSION['baza'])) {
                echo "<table><th>Tabele w bazie {$_SESSION['baza']}:</th>";
                $sql = "show tables";
                $query = $db -> prepare($sql);
                $query -> execute();
                $result = $query -> get_result();
                if($result->num_rows == 0){
                    echo '<tr><td>W tej bazie nie ma tabel!</td></tr>';
                }
                while($row = $result->fetch_array()) {
                    echo '<tr><td>'.$row[0].'</td></tr>';
                }
            }
        ?>
    </table>
</div>

<div class="zapytanie">
    <form action="" method="post">
        <textarea name="zapytanie" id="" cols="30" rows="5"><?php echo !empty($_SESSION['zapytanie']) ? $_SESSION['zapytanie'] : "";?></textarea><br />
        <button>Prześlij</button>
    </form>
</div>

<div class="wynik">
    <table>
        <pre>
            <?php
            if (isset($_SESSION['zapytanie'])) {
                $query = $db->prepare($_SESSION['zapytanie']);
                $query->execute();
                $result = $query->get_result();
                if ($result->num_rows == 0) {

                } else {
                    $row = $result->fetch_assoc();
                    foreach ($row as $key => $value) {
                        echo "key: " . $key . " value: $value<br />";
                    }

                    while ($row = $result->fetch_assoc()) {
                        print_r($row);
                    }
                }
            }

            ?>
        </pre>
    </table>
</div>

</body>
</html>