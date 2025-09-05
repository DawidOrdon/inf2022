<?php
$zmienna = 4;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<pre>
<?php
$jedzenie = array (
    "owoce" => array( "1" => "jabłko", "2"=> "gruszka","3" => "śliwka"),
    "warzywa" => array ( "por", "seler", 'marchew'),
    "mięso" => array ( 5 => "drób", 6 =>"wieprzowina" ));
$jedzenie['uzywki'][3]='kawa';
print($jedzenie["owoce"]['3'] . '<br>');
print($jedzenie["warzywa"][1] . '<br>');
print($jedzenie["uzywki"][3] . '<br>');
print_r($jedzenie)

?>
</pre>
</body>
</html>