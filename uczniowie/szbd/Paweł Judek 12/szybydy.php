<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wybierz bazę danych</title>
</head>
<body>
<h2>Wybierz bazę danych:</h2>
<form method="post">
    <?php
    $db = new mysqli("localhost", "root", "", "");
    $sql = "SHOW DATABASES";
    $result = $db->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $dbname = $row['Database'];
            echo "<label><input type='radio' name='selected_db' value='$dbname'> $dbname</label><br>";
        }
    } else {
        echo "Błąd zapytania: " . $db->error;
    }
    $db->close();

    ?>
    <br>
    <input type="submit" value="Pokaż kolumny">
</form>

<?php
session_start();
$_SESSION['start']=$_POST['selected_db'];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selected_db'])) {
    $selectedDb = $_POST['selected_db'];
    echo "<h3>Wybrana baza danych:</h3>" . $_SESSION["start"] . "<br>";

    $db = new mysqli("localhost", "root", "", $selectedDb);
    $tablesResult = $db->query("SHOW TABLES");

    if ($tablesResult) {
        while ($tableRow = $tablesResult->fetch_array()) {
            $tableName = $tableRow[0];
            echo "<strong>Tabela: $tableName</strong><br>";
            $columnsResult = $db->query("SHOW COLUMNS FROM `$tableName`");

            if ($columnsResult) {
                echo "<ul>";
                while ($col = $columnsResult->fetch_assoc()) {
                    echo "<li>" . htmlspecialchars($col['Field']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "Błąd przy pobieraniu kolumn: " . $db->error;
            }
        }
    } else {
        echo "Błąd przy pobieraniu tabel: " . $db->error;
    }

    $db->close();
}
?>
<div class="zapytanie">
    <form action="" method="post">
        <textarea name="zapytanie" id="" cols="30" rows="5"><?php echo !empty($_SESSION['zapytanie']) ? $_SESSION['zapytanie'] : "";?></textarea><br />
        <button>wyslij</button>
    </form>
    <table>
        <pre>
        <?php
        if(isset($_SESSION['zapytanie'])){
            $query=$db->prepare($_SESSION['zapytanie']);
            $query->execute();
            $result=$query->get_result();
            if($result->num_rows==0){

            }else{
                $row=$result->fetch_assoc();
                foreach($row as $key=>$value){
                    echo "key: ".$key." value: $value<br />";
                }

                while($row=$result->fetch_assoc()){
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
