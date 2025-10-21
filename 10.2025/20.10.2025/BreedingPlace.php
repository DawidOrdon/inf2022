<?php

class BreedingPlace
{
    public function __construct($name)
    {
        $this->b_name = $name;
    }
    private $b_name;
    private $birds = [];

    public function new_bird($bird){
        $this->birds[] = $bird;
    }
    public function get_birds(){
        foreach ($this->birds as $bird){
            echo $bird->get_name()."<br />";
        }
    }
}