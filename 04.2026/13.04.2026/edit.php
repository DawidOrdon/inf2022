<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'tanks');
$sql="select * from tanks where tank_id=".$_GET['tank_id'];
$query=$db->prepare($sql);
$query->execute();
$result=$query->get_result();
$row=$result->fetch_object();
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
<form action="./create.php" method="post">
    <table>
        <tr>
            <td><label for="name">Nazwa</label></td>
            <td><input type="text" name="name" id="name" value="<?php echo $row->name;?>"></td>
        </tr>
        <tr>
            <td><label for="vin">Vin</label></td>
            <td><input type="text" name="vin" id="vin" value="<?php echo $row->vin;?>"></td>
        </tr>
        <tr>
            <td><label for="typ">typ</label></td>
            <td><select name="type_id" id="typ" style="width: 100%">
                    <?php
                    $sql = "SELECT * FROM types";
                    $query = $db->prepare($sql);
                    $query->execute();
                    $result = $query->get_result();

                    //            $result = $db->query("SELECT * FROM types");

                    while ($row2 = $result->fetch_object()) {
                        $selected = ($row2->type_id == $row->type_id) ? 'selected' : '';
                        echo "<option value='{$row2->type_id}' {$selected}>{$row2->name}</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td colspan="2" ><input type="submit" value="zapisz" style="width: 100%"></td>
        </tr>
        <?php
        if(isset($_SESSION['error'])){
            echo "<tr><td colspan='2' style='color: red'>{$_SESSION['error']}</td></tr>";
            unset($_SESSION['error']);
        }
        ?>
        <?php
        if(isset($_SESSION['message'])){
            echo "<tr><td colspan='2' style='color: green'>{$_SESSION['message']}</td></tr>";
            unset($_SESSION['message']);
        }
        ?>
    </table>
</form>
</body>
</html>
