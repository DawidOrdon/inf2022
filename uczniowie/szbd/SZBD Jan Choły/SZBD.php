<?php
session_start();
if(isset($_POST['baza'])){
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
    <title>SZBD</title>
    <style>
.button{

        width: 8vw;
        background-color:aliceblue ;
        border-radius: 0.3vw;
        margin-bottom: 0.2vw;
        transition: all 0.3s;

    }
    .button:hover{
        border: 0.3vw solid #c19156;

    }
.header{
    font-family: "Baskerville Old Face";
    font-size: 1.3vw;
    margin-left: 2.3vw;
}
.jakabaza{
    margin-left: 0vw;
}
input[type="radio"]{
    appearance: none;
    width: 1vw;
    height: 1vw;
    border: 0.2vw solid #aaa;
    border-radius: 30%;
    display: inline-block;
    position: relative;
    cursor: pointer;
    transition: all 0.2s ease;
}
input[type="radio"]:checked{
    border-color: green;
}
input[type="radio"]:checked::after{
    content: "";
    width: 10px;
    height: 10px;
    background: green;
    border-radius: 40%;
    position: absolute;
    top: 0.3px;
    left: 0.3px;
}
.tabele{
    float: right;
    border-color: green;
    border: 0.3vw solid #c19156;
    margin-top: -23vw;
}

    </style>
</head>
<body>
<div action="" method="post">
    <div class="header">SZBD</div>
        <input type="submit" class="button" value="wybierz baze"><div class="jakabaza">
        <?php
        if(isset($_SESSION['baza'])) {
            echo"Wybrałeś bazę: " . $_SESSION['baza'] ;
        }

        ?>
    </div>
    <br>

        <?php
    $db = new mysqli("localhost","root","","");
    $sql="show databases";
    $query= $db->prepare($sql);
    $query->execute();
    $result=$query->get_result();
    while($row=$result->fetch_array()) {
        echo "

<input type='radio' name='baza' id='$row[0]' value='$row[0]'>
  
                    <label for='$row[0]'>{$row[0]}<br>
    ";
}

        echo "</table></form>";
        if(isset($_SESSION['baza'])) {
            echo"<div class='tabele'>";
            echo"tabele dla bazy: {$_SESSION['baza']} <br />";
            $db=new mysqli("localhost","root","",$_SESSION['baza']);
            $sql='show tables';
            $query=$db->prepare($sql);
            $query->execute();
            $result=$query->get_result();
            while($row=$result->fetch_array()){
                echo $row[0]."<br />";
            }
            ?>
</div>

         <div class="zapytanie">
    <form action="" method="post">
        <textarea name="zapytanie" id="" cols="30" rows="5"><?php echo $_SESSION['zapytanie']!=null ? $_SESSION['zapytanie'] : "";?></textarea><br />
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
        }
        ?>
            </pre>
</table>
</div>




</body>
</html>