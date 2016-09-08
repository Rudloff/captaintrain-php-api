<?php
/**
 * Trip class.
 *
 * PHP version 5.6
 *
 * @category CaptainTrain
 *
 * @author   Pierre Rudloff <contact@rudloff.pro>
 * @license  LGPL https://www.gnu.org/copyleft/lesser.html
 *
 * @link     https://github.com/Rudloff/captaintrain-php-api
 */
namespace CaptainTrain;

/**
 * Manage trips.
 *
 * PHP version 5.6
 *
 * @category CaptainTrain
 *
 * @author   Pierre Rudloff <contact@rudloff.pro>
 * @license  LGPL https://www.gnu.org/copyleft/lesser.html
 *
 * @link     https://github.com/Rudloff/captaintrain-php-api
 */
class Trip
{
    public $arrivalDate;
    public $departureDate;
    public $arrivalStation;
    public $departureStation;

    /**
     * Trip class constructor.
     *
     * @param string $arrivalDate        Arrival date
     * @param string $departureDate      Departure date
     * @param int    $arrivalStationId   Arrival station ID
     * @param int    $departureStationId Departure station ID
     */
    public function __construct(
        $arrivalDate, $departureDate, $arrivalStationId, $departureStationId
    ) {
        $stations = StationsManager::getInstance();
        $this->arrivalDate = new \DateTime($arrivalDate);
        $this->departureDate = new \DateTime($departureDate);
        $this->arrivalStation = $stations->getById($arrivalStationId);
        $this->departureStation = $stations->getById($departureStationId);
    }
}
