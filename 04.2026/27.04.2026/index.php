<?php
    session_start();
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
        .danger{
            color: red;
        }
        .success{
            color:green;
        }
    </style>
</head>
<body>
<form action="./create.php" method="post">
    <label for="nazwa">Nazwa produktu</label><input type="text" name="nazwa" id="nazwa" value="<?php echo isset($_SESSION['nazwa'])?$_SESSION['nazwa']:"";?>">
    <label for="cena">cena</label><input type="number" name="cena" id="cena" step="0.01" value="<?php echo isset($_SESSION['cena'])?$_SESSION['cena']:"";?>">
    <input type="submit" value="dodaj">
</form>
<?php
    if(isset($_SESSION['alert'])){
        $color = $_SESSION['type']==0?"danger":"success";
        echo "<p class='$color'>{$_SESSION['alert']}</p>";
        unset($_SESSION['alert']);
    }
?>
<table>
    <tr>
        <th>nazwa</th>
        <th>cena</th>
        <th>edytuj</th>
        <th>usun</th>
    </tr>
    <?php
        $db = new mysqli('localhost', 'root', '', 'orlen');
        $query = $db->prepare("SELECT * FROM stop_cafe");
        $query->execute();
        $result = $query->get_result();
        while ($row = $result->fetch_object()) {
            echo"<tr>
                    <td>{$row->nazwa}</td>
                    <td>{$row->cena}</td>
                    <td><a href='./edit.php?id={$row->id}'>
                            <button>edytuj</button>
                        </a>
                    </td>
                    <td><a href='./delete.php?id={$row->id}'>
                            <button>usun</button>
                        </a>
                    </td>
                </tr>";
        }
    ?>

</table>
</body>
</html>