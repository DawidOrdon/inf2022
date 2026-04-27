<?php
    $db = new mysqli('localhost', 'root', '', 'orlen');
    $query = $db->prepare("select * from stop_cafe where id=?");
    $query->bind_param('i', $_GET['id']);
    $query->execute();
    $row = $query->get_result()->fetch_object();
?>
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
    <input type="hidden" name="id" value="<?php echo $row->id;?>">
    <label for="nazwa">Nazwa produktu</label><input type="text" name="nazwa" id="nazwa" value="<?php echo $row->nazwa;?>">
    <label for="cena">cena</label><input type="number" name="cena" id="cena" step="0.01" value="<?php echo $row->cena;?>">
    <input type="submit" value="edytuj">
</form>
    <?php
    session_start();
        if (!empty($_POST['nazwa'])&&!empty($_POST['cena'])&&is_numeric($_POST['cena'])) {
            $query = $db->prepare("update stop_cafe set nazwa=?, cena=? where id=?");
            $query->bind_param("sdi", $_POST['nazwa'], $_POST['cena'],$_POST['id']);
            $query->execute();
            $_SESSION['type'] = 1;
            $_SESSION['alert'] = "pomyślnie edytowani produkt!";
            header('location: ./index.php');
        }
    ?>
</body>
</html>

