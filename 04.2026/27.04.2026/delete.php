<?php
var_dump($_GET);
$db = new mysqli('localhost', 'root', '', 'orlen');
$query = $db->prepare("delete from stop_cafe where id=?");
$query->bind_param('i', $_GET['id']);
$query->execute();
$db->close();
header('location: index.php');