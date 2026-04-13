<?php
$db = new mysqli('localhost', 'root', '', 'tanks');
session_start();
var_dump($_POST);
if (!empty($_POST['name'])&&!empty($_POST['vin'])&&!empty($_POST['type_id'])&&is_numeric($_POST['type_id'])) {
    $sql="INSERT INTO tanks.tanks (name, vin, type_id) VALUES (?, ?, ?);";
    $query = $db->prepare($sql);
    $query->bind_param('ssi', $_POST['name'], $_POST['vin'], $_POST['type_id']);
    $query->execute();
    $_SESSION['message'] = "Czołg dodany";
    header('location: ./index.php');
}else{
    $_SESSION['name']=$_POST['name'];
    $_SESSION['vin']=$_POST['vin'];
    $_SESSION['type_id']=$_POST['type_id'];
    $_SESSION['error']="Podaj prawidłowe dane";
    header('location: ./index.php');
}
