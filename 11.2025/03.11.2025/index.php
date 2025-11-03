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
    $file = fopen("data.txt", "a") or die("nie znaleziono pliku");
//    echo fread($file,filesize("users.txt"));

//    while(!feof($file)) {
//        echo fgetc($file)."<br />";
//    }
    $string = "szkola na lesnej3";
    fwrite($file, $string);
    fclose($file);
    if(file_exists("data432.txt")){
        echo "plik istnieje";
    }else{
        echo "nie ma pliku";
    }

    ?>
</body>
</html>