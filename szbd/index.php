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
            echo"wybrales/as baze: ".$_SESSION['baza'];
        }
    ?>
</div>
</body>
</html>