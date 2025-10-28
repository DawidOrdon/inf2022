<?php
include_once ('./Rosliny.php');

class Drzewa extends Rosliny
{
    protected $drewno=23;
    public function zetnij()
    {
        return $this->drewno*$this->getAge();
    }

    /**
     * @return mixed
     */
    public function getDrewno()
    {
        return $this->drewno;
    }

    /**
     * @param mixed $drewno
     */
    public function setDrewno($drewno): void
    {
        $this->drewno = $drewno;
    }

}