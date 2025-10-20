<?php
session_start();
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przeglądarka baz danych</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .bazy, .tabele { float: left; margin-right: 40px; }
        table { border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 5px 10px; }
        h3 { margin-top: 40px; }
    </style>
</head>
<body>

<div class="bazy">
    <form method="post">
        <table>
            <tr><th colspan="2">Wybierz bazę danych</th></tr>
            <?php
            $db = new mysqli("localhost", "root", "");
            $result = $db->query("SHOW DATABASES");
            while ($row = $result->fetch_assoc()) {
                $baza = $row['Database'];
                echo "<tr>
                        <td><input type='radio' name='baza' value='$baza'></td>
                        <td>$baza</td>
                      </tr>";
            }
            ?>
            <tr><td colspan="2"><button type="submit">Wybierz</button></td></tr>
        </table>
    </form>
</div>

<div class="tabele">
<?php
if (!empty($_POST['baza'])) {
    $_SESSION['baza'] = $_POST['baza'];
}

if (isset($_SESSION['baza'])) {
    $wybrana = $_SESSION['baza'];
    echo "<h2>Wybrana baza: <em>$wybrana</em></h2>";

    $db = new mysqli("localhost", "root", "", $wybrana);
    if ($db->connect_error) {
        echo "Błąd połączenia: " . $db->connect_error;
        exit;
    }

    $result = $db->query("SHOW TABLES");
    while ($row = $result->fetch_array()) {
        $tabela = $row[0];
        echo "<h3>Tabela: $tabela</h3>";

        $dane = $db->query("SELECT * FROM `$tabela`");
        if ($dane->num_rows > 0) {
            echo "<table><tr>";
            while ($field = $dane->fetch_field()) {
                echo "<th>{$field->name}</th>";
            }
            echo "</tr>";

            while ($rekord = $dane->fetch_assoc()) {
                echo "<tr>";
                foreach ($rekord as $wartosc) {
                    echo "<td>$wartosc</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Brak danych w tej tabeli.<br>";
        }
    }
}
?>
</div>

</body>
</html>
