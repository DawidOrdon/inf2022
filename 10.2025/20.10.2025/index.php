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
    class Bird
    {
        public function __construct($can_fly, $weight)
        {
            $this->can_fly = $can_fly;
            $this->weight = $weight;
            echo "narodzil sie nowy ptak <br />";
        }
        private $can_fly;
        private $weight;

        public function getCanFly()
        {
            return $this->can_fly;
        }
        public function setCanFly($can_fly){
            $this->can_fly = $can_fly;
        }
        public function fly()
        {
            if($this->can_fly==true){
                echo "ptak leci <br />";
            }else{
                echo "nieloty nie lataja <br />";
            }
        }
        public function __destruct()
        {
            echo"w rosole wylądowało {$this->weight}g. ptactwa<br />";
        }
    }

    $pigeon = new Bird(true, 200);
    $pigeon->fly();

    $chicken = new Bird(false, 1200);
    $chicken->fly();
    print_r($pigeon instanceof Bird);

?>
<br />
<br />
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae blanditiis, commodi corporis cumque delectus dolore error ex excepturi fugiat illo magni modi quae quisquam quod ratione repellat totam veniam voluptatibus!
</body>
</html>