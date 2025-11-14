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
    interface cos
    {
        public function opiecz();
    }
    abstract class Kanapka implements cos
    {
        private $ser=False;
        private $szynka=False;
        public function __construct($ser,$szynka)
        {
            $this->ser=$ser;
            $this->szynka=$szynka;
        }
    }
    class Tost extends Kanapka
    {
        private $wypieczenie=0;
        public function opiecz(){
            $this->wypieczenie++;
            if($this->wypieczenie>5){
                $this->__destruct();
            }
        }
        public function __destruct(){
            echo 'spaliles/as kanapke';
        }
    }

    ?>
</body>
</html>