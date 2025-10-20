<?php
session_start();
if (!isset($_SESSION['baza'])) {
    $_SESSION['baza'] = "mysql";
}
if (!empty($_POST['baza'])) {
    $_SESSION['baza'] = $_POST['baza'];
}
if (!empty($_POST['zapytanie'])) {
    $_SESSION['zapytanie'] = $_POST['zapytanie'];
}
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>SQL Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            display: flex;
            gap: 30px;
        }
        .bazy, .tabele, .zapytanie {
            flex: 1;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        textarea {
            width: 100%;
            font-family: monospace;
        }
        button {
            padding: 8px 12px;
            margin-top: 10px;
            cursor: pointer;
        }
        .result-table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<h2>Panel zapytań SQL</h2>
<div class="container">
    <div class="bazy">
        <form method="post">
            <table>
                <tr><th colspan="2">Wybierz bazę danych</th></tr>
                <?php
                $db = new mysqli("localhost", "root", "", $_SESSION['baza']);
                $sql = 'SHOW DATABASES';
                $query = $db->prepare($sql);
                $query->execute();
                $result = $query->get_result();
                while ($row = $result->fetch_object()) {
                    echo "<tr><td><input type='radio' name='baza' value='{$row->Database}'></td><td>{$row->Database}</td></tr>";
                }
                ?>
                <tr><td colspan="2"><button type="submit">Wybierz</button></td></tr>
            </table>
        </form>
    </div>

    <div class="tabele">
        <strong>Tabele w bazie: <?= $_SESSION['baza'] ?></strong>
        <table>
            <?php
            $sql = 'SHOW TABLES';
            $query = $db->prepare($sql);
            $query->execute();
            $result = $query->get_result();
            if ($result->num_rows == 0) {
                echo "<tr><td>Brak tabel w bazie</td></tr>";
            } else {
                while ($row = $result->fetch_array()) {
                    echo "<tr><td>{$row[0]}</td></tr>";
                }
            }
            ?>
        </table>
    </div>

    <div class="zapytanie">
        <form method="post">
            <label><strong>Wpisz zapytanie SQL:</strong></label><br>
            <textarea name="zapytanie" rows="5"><?= !empty($_SESSION['zapytanie']) ? $_SESSION['zapytanie'] : ""; ?></textarea><br>
            <button type="submit">Wyślij zapytanie</button>
        </form>

        <div class="result-table">
            <?php
            if (!empty($_SESSION['zapytanie'])) {
                $query = $db->prepare($_SESSION['zapytanie']);
                if ($query && $query->execute()) {
                    $result = $query->get_result();
                    if ($result && $result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr>";
                        foreach ($result->fetch_fields() as $field) {
                            echo "<th>{$field->name}</th>";
                        }
                        echo "</tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            foreach ($row as $value) {
                                echo "<td>$value</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>Brak wyników.</p>";
                    }
                } else {
                    echo "<p>Błąd w zapytaniu SQL.</p>";
                }
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
