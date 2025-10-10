<?php
    include_once('./functions.php');
    include_once('./functions.php');
//    require_once('./functions.php');
//    require_once('./functions.php');
nav();
    if($db=connect('baza')){
        echo"połączenie działa";
        $db->close();
    }else{
        echo"bład połączenia";
    }
    $hash=password_hash('abc', PASSWORD_DEFAULT);
    echo $hash;
    if(password_verify('absc', $hash)){
        echo"haslo sie zgadza";
    }else{
        echo "bledne haslo";
    }
?>
</body>
</html>