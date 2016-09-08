<?php
/**
 * StationsManager class.
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
 * Singleton used to get stations.
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
class StationsManager
{
    private static $_instance;
    private $_stations;

    /**
     * StationsManager class constructor.
     */
    public function __construct()
    {
        $handle = fopen(
            __DIR__.'/../vendor/captaintrain/stations/stations.csv', 'r'
        );
        if ($handle !== false) {
            while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                if ($data[0] != 'id') {
                    $this->_stations[$data[0]] = new Station($data);
                }
            }
            fclose($handle);
        }
    }

    /**
     * Get singleton instance.
     *
     * @return StationsManager
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Get station by ID.
     *
     * @param int $id Station ID
     *
     * @return Station
     */
    public function getById($id)
    {
        return $this->_stations[$id];
    }
}
