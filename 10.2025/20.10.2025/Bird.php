<?php

class Bird
{
    public function __construct($can_fly,$name, $weight)
    {
        $this->can_fly = $can_fly;
        $this->weight = $weight;
        $this->name = $name;
        echo "narodzil sie nowy ptak <br />";
    }
    private $can_fly;
    private $weight;
    private $name;
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
    public function get_name(){
        return $this->name;
    }
    public function __destruct()
    {
        echo"w rosole wylądowało {$this->weight}g. ptactwa<br />";
    }
}