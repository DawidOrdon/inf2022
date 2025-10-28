<?php

class Brzoza extends Drzewa
{
    private $twardosc=0.9;
    private $cena =18;

    public function deski(){
        return $this->zetnij()*$this->cena*$this->twardosc;
    }
}