<?php
namespace CaptainTrain;

class Trip
{
    public $arrivalDate;
    public $departureDate;
    public $arrivalStation;
    public $departureStation;

    function __construct($arrivalDate, $departureDate, $arrivalStationId, $departureStationId)
    {
        $stations = StationsManager::getInstance();
        $this->arrivalDate = new \DateTime($arrivalDate);
        $this->departureDate = new \DateTime($departureDate);
        $this->arrivalStation = $stations->getById($arrivalStationId);
        $this->departureStation = $stations->getById($departureStationId);
    }
}
