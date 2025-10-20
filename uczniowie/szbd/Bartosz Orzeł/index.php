<?php
session_start();
if(!empty($_POST['baza'])){
    $_SESSION['baza'] = $_POST['baza'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .bazy, .tabele{
            float: left;
        }
    </style>
</head>
<body>
<div class="bazy">
    <form action="" method="post">
        <table>
            <tr>
                <td colspan="2">
                    <button>Wybierz baze</button>
                </td>
            </tr>

            <?php
            $db = new mysqli("localhost", "root", "");
            $sql='show databases';
            $query = $db->prepare($sql);
            $query->execute();
            $result=$query->get_result();
            while ($row=$result->fetch_object()){
                echo "<tr><td><input type='radio' name='baza' value='{$row->Database}'></td><td>{$row->Database}</td></tr>";
            }
            ?>
        </table>
    </form>
</div>
<div class="tabele">
    <?php
    if(isset($_SESSION['baza'])){
        echo "Wybrałeś/aś bazę: " . $_SESSION['baza'] . "<br>";

        $db = new mysqli("localhost", "root", "", $_SESSION['baza']);
        if ($db->connect_error) {
            echo "Błąd połączenia z bazą: " . $db->connect_error;
        } else {
            $sql = "SHOW TABLES";
            $result = $db->query($sql);

            if ($result) {
                echo "<ul>";
                while ($row = $result->fetch_array()) {
                    echo "<li>{$row[0]}</li>";
                }
                echo "</ul>";
            }
        }
    }

    if (isset($_SESSION['baza'])) {
        echo "<hr>";
        echo "<form method='post'>";
        echo "<label for='zapytanie'>Wpisz zapytanie SELECT:</label><br>";
        echo "<input type='text' name='zapytanie' id='zapytanie'><br><br>";
        echo "<input type='submit' value='Wykonaj zapytanie'>";
        echo "</form>";

        if (!empty($_POST['zapytanie'])) {
            $zapytanie = $_POST['zapytanie'];

            if (stripos(trim($zapytanie), 'SELECT') === 0) {
                $db = new mysqli("localhost", "root", "", $_SESSION['baza']);
                $result = $db->query($zapytanie);

                if ($result && $result->num_rows > 0) {
                    echo "<table border='1' cellpadding='5' cellspacing='0'><tr>";
                    while ($fieldinfo = $result->fetch_field()) {
                        echo "<th>{$fieldinfo->name}</th>";
                    }
                    echo "</tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        foreach ($row as $cell) {
                            echo "<td>{$cell}</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Brak wyników lub błąd zapytania.";
                }
            }
        }
    }


    ?>
</div>

</body>
</html>