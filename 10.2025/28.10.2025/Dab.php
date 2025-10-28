<?php
include_once ('./Drzewa.php');
class Dab extends Drzewa
{
    private $twardosc=1.4;
    private $cena =23;

    public function deski(){
        return $this->zetnij()*$this->cena*$this->twardosc;
    }
}