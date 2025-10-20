<?php
session_start();
if(!isset($_SESSION['baza'])){
    $_SESSION['baza'] = "mysql";
}
if(!empty($_POST['baza'])){
    $_SESSION['baza'] = $_POST['baza'];
}
if(!empty($_POST['zapytanie'])){
    $_SESSION['zapytanie'] = $_POST['zapytanie'];
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
        .bazy, .tabele, .zapytanie{
            float: left;
        }
        .zapytanie{
            width: 50%;
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
            $db = new mysqli("localhost", "root", "",$_SESSION['baza']);
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
    <table>
        <?php
        if(isset($_SESSION['baza'])){
            echo"wybrales/as baze: ".$_SESSION['baza']."<br />";
            $sql='show tables';
            $query = $db->prepare($sql);
            $query->execute();
            $result=$query->get_result();
            if($result->num_rows==0){
                echo"<tr><td>W danej bazie nie ma tabel</td></tr>";
            }
            while ($row=$result->fetch_array()){
                echo"<tr><td>$row[0]</td></tr>";
            }
        }
        ?>
    </table>
</div>
<div class="zapytanie">
    <form action="" method="post">
        <textarea name="zapytanie" id="" cols="30" rows="5"><?php echo !empty($_SESSION['zapytanie']) ? $_SESSION['zapytanie'] : "";?></textarea><br />
        <button>wyslij</button>
    </form>
    <table>
        <pre>
        <?php
        if(isset($_SESSION['zapytanie'])){
            $query=$db->prepare($_SESSION['zapytanie']);
            $query->execute();
            $result=$query->get_result();
            if($result->num_rows==0){

            }else{
                $row=$result->fetch_assoc();
                foreach($row as $key=>$value){
                    echo "key: ".$key." value: $value<br />";
                }

                while($row=$result->fetch_assoc()){
                    print_r($row);
                }
            }
        }

        ?>
            </pre>
    </table>
</div>
</body>
</html>