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
    interface pojazd_metody
    {
        public function jedz();
        public function stop();
    }
     abstract class pojazd implements pojazd_metody
    {
        public $vmax = 45;
        public $kola;

        public function jedz(){
            echo "pojazd jedzie z predkoscia ".$this->vmax."km/h<br>";
        }
    }
    class rower extends pojazd
    {
        private $pedaly=2;
        public function get_pedaly()
        {
            echo $this->pedaly;
        }

        public function stop()
        {
            $this->vmax=0;
            echo "stop";
        }
    }

    class rower_elektryczny extends rower{
        public $silnik ="2 kw";
    }

//    $pojazd = new pojazd();
//    $pojazd->jedz();
    $rower = new rower();
    $rower_el = new rower_elektryczny();
    $rower->get_pedaly();
    $rower_el->get_pedaly();

?>
</body>
</html>