<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'tanks');
echo $_GET['tank_id'];
$sql="select * from tanks where tank_id=".$_GET['tank_id'];
$query=$db->prepare($sql);
$query->execute();
$result=$query->get_result();
if($result->num_rows == 1){
    $sql = "delete from tanks where tank_id=".$_GET['tank_id'];
    $query=$db->prepare($sql);
    $query->execute();
    $_SESSION['message'] = "Czołg usunięty";
    header('location: ./index.php');
}else{
    $_SESSION['error']="Podaj prawidłowe dane";
    header('location: ./index.php');
}
