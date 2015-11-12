<?php
namespace CaptainTrain;

class Station
{
    private $id;
    public $name;

    function __construct($data)
    {
        $this->id = $data[0];
        $this->name = $data[1];
    }
}
