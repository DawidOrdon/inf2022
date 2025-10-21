<?php
    include_once ('BreedingPlace.php');
    include_once ('Bird.php');
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
<a href="./new_bird.php">nowy ptak</a><br />
<a href="./new_breeding_place.php">nowa hodowla</a><br />
<a href="./add_bird.php">dodaj ptaka do hodowli</a><br />
<pre>
<?php
    session_start();
    if(isset($_SESSION['bird'])){
        print_r($_SESSION['bird']);
    }else{
        echo "brak ptaka w sesji";
    }
    if(isset($_SESSION['breeding_place'])){
        print_r($_SESSION['breeding_place']);
        $_SESSION['breeding_place']->get_birds();
    }else{
        echo "brak hodowli w sesji";
    }

?>
</pre>
<br />
<br />
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae blanditiis, commodi corporis cumque delectus dolore error ex excepturi fugiat illo magni modi quae quisquam quod ratione repellat totam veniam voluptatibus!
</body>
</html>