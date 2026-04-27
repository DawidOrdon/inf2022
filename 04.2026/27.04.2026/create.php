<?php
session_start();
    if (!empty($_POST['nazwa'])&&!empty($_POST['cena'])&&is_numeric($_POST['cena'])) {
        $db= new mysqli("localhost","root","","orlen");
        $query = $db->prepare("INSERT INTO stop_cafe (nazwa,cena) VALUES (?, ?)");
        $query->bind_param("sd", $_POST['nazwa'], $_POST['cena']);
        $query->execute();
        if($query->affected_rows){
            $_SESSION['nazwa'] = "";
            $_SESSION['cena'] = "";
            $_SESSION['type'] = 1;
            $_SESSION['alert'] = "pomyślnie dodano produkt!";
            header("location: ./index.php");
        }else{
            $_SESSION['type'] = 0;
            $_SESSION['alert'] = "bład w dodawaniu produktu!";
            $_SESSION['nazwa'] = $_POST['nazwa'];
            $_SESSION['cena'] = $_POST['cena'];
            header("location: ./index.php");
        }
    }else{
        $_SESSION['type'] = 0;
        $_SESSION['alert'] = "bład w dodawaniu produktu!";
        $_SESSION['nazwa'] = $_POST['nazwa'];
        $_SESSION['cena'] = $_POST['cena'];
        header("location: ./index.php");
    }

?>