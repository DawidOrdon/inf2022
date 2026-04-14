<?php
$db = new mysqli('localhost', 'root', '', 'tanks');
session_start();
if (!empty($_POST['name'])&&!empty($_POST['vin'])&&!empty($_POST['type_id'])&&is_numeric($_POST['type_id'])) {
    $sql="UPDATE tanks.tanks t SET t.name = ? , t.vin = ? , t.type_id = ? WHERE t.tank_id = ?;";
    $query = $db->prepare($sql);
    $query->bind_param('ssii', $_POST['name'], $_POST['vin'], $_POST['type_id'],$_POST['tank_id']);
    $query->execute();
    $_SESSION['message'] = "Czołg edytowano";
    unset($_SESSION['name']);
    unset($_SESSION['vin']);
    unset($_SESSION['type_id']);
    header('location: ./index.php');
}else{
    $_SESSION['name']=$_POST['name'];
    $_SESSION['vin']=$_POST['vin'];
    $_SESSION['type_id']=$_POST['type_id'];
    $_SESSION['error']="Podaj prawidłowe dane";
    header('location: ./edit.php?tank_id=' . $_POST['tank_id']);
}
