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
<?php
$ciag = 'Witajcie w nowej bajce';
echo strlen($ciag)."<br />";
echo str_word_count($ciag)."<br />";
echo strpos($ciag, 'ej')."<br />";
echo strtoupper($ciag)."<br />";
echo strtolower($ciag)."<br />";
echo str_replace('bajce','tendur',$ciag)."<br />";
echo strrev($ciag)."<br />";
$arr = explode('a',$ciag);
print_r($arr);
echo substr($ciag,5,5);
?>
</body>
</html>

