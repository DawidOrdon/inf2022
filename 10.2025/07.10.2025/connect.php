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
?>
</body>
</html>