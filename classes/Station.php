<?php
/**
 * Station class.
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
 * Manage stations.
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
class Station
{
    private $_id;
    public $name;

    /**
     * Station class constructor.
     *
     * @param array $data Array extracted from stations.csv row
     */
    public function __construct($data)
    {
        $this->_id = $data[0];
        $this->name = $data[1];
    }
}
