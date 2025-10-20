<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Przeglądarka baz danych</title>
   
</head>
<body>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['baza'])) {
    $_SESSION['baza'] = $_POST['baza'];
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$db = new mysqli("localhost", "root", "");
if ($db->connect_error) {
    die("Błąd połączenia: " . $db->connect_error);
}

$sql = "SHOW DATABASES";
$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

echo '<form method="POST">';
echo '<h2>Wybierz bazę danych:</h2>';

while ($row = $result->fetch_array()) {
    $nazwa_bazy = htmlspecialchars($row[0]);
    $checked = (isset($_SESSION['baza']) && $_SESSION['baza'] === $nazwa_bazy) ? 'checked' : '';
    echo "<label><input type='radio' name='baza' value='$nazwa_bazy' $checked> $nazwa_bazy</label>";
}

echo '<br><br><button type="submit">Wybierz</button>';
echo '</form>';

echo '<div class="database">';

if (isset($_SESSION['baza'])) {
    $baza = htmlspecialchars($_SESSION['baza']);
    echo "<h3>Wybrano bazę: $baza</h3>";

    $db_selected = new mysqli("localhost", "root", "", $baza);
    if ($db_selected->connect_error) {
        die("Błąd połączenia z wybraną bazą: " . $db_selected->connect_error);
    }

    $tables_result = $db_selected->query("SHOW TABLES");
    if ($tables_result) {
        echo "<ul>";
        while ($table_row = $tables_result->fetch_array()) {
            $table_name = $table_row[0];
            echo "<li><strong>Tabela:</strong> $table_name<ul>";

            $columns_result = $db_selected->query("SHOW COLUMNS FROM `$table_name`");
            if ($columns_result) {
                while ($column_row = $columns_result->fetch_array()) {
                    $column_name = $column_row['Field'];
                    echo "<li>$column_name</li>";
                }
            } else {
                echo "<li>Nie można pobrać kolumn z tabeli $table_name.</li>";
            }

            echo "</ul></li>";
        }
        echo "</ul>";
    } else {
        echo "Nie można pobrać listy tabel.<br>";
    }

    echo '</div>';
    echo '<div class=question>';
    echo '<form method="POST">';
    echo '<h2>Wykonaj zapytanie SQL:</h2>';
    echo '<label for="sql">Zapytanie:</label>';
    echo '<input type="text" name="sql" id="sql" required>';
    echo '<br><br><button type="submit" name="wykonaj">Wykonaj</button>';
    echo '</form>';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wykonaj']) && isset($_POST['sql'])) {
        $zapytanie = trim($_POST['sql']);

        $niedozwolone = ['DROP', 'DELETE', 'TRUNCATE', 'ALTER'];
        foreach ($niedozwolone as $blokada) {
            if (stripos($zapytanie, $blokada) !== false) {
                echo "<p style='color:red;'>Zapytanie zawiera niedozwoloną komendę: $blokada</p>";
                exit;
            }
        }

        echo "<h3>Wynik zapytania: <code>$zapytanie</code></h3>";

        $wynik = $db_selected->query($zapytanie);
        if ($wynik && $wynik instanceof mysqli_result) {
            echo "<table><tr>";
            while ($fieldinfo = $wynik->fetch_field()) {
                echo "<th>{$fieldinfo->name}</th>";
            }
            echo "</tr>";
            while ($row = $wynik->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } elseif ($wynik === true) {
            echo "<p>Zapytanie wykonane pomyślnie.</p>";
        } else {
            echo "<p style='color:red;'>Błąd zapytania: " . $db_selected->error . "</p>";
        }
    }

    $db_selected->close();
}
echo '</div>';
$stmt->close();
$db->close();
?>
</body>
</html>
