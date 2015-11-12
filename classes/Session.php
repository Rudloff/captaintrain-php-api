<?php
/**
 * Session class
 *
 * PHP version 5.6
 *
 * @category CaptainTrain
 * @package  CaptainTrain
 * @author   Pierre Rudloff <contact@rudloff.pro>
 * @license  LGPL https://www.gnu.org/copyleft/lesser.html
 * @link     https://github.com/Rudloff/captaintrain-php-api
 */
namespace CaptainTrain;
/**
 * Manage Captain Train session
 *
 * PHP version 5.6
 *
 * @category CaptainTrain
 * @package  CaptainTrain
 * @author   Pierre Rudloff <contact@rudloff.pro>
 * @license  LGPL https://www.gnu.org/copyleft/lesser.html
 * @link     https://github.com/Rudloff/captaintrain-php-api
 */
class Session
{
    private $_token;
    private $_client;

    /**
     * Session class constructor
     * @param string $email    E-mail address
     * @param string $password Password
     */
    function __construct($email, $password)
    {
        $this->_client = new \GuzzleHttp\Client();
        $response = $this->_client->request(
            'POST', 'https://www.captaintrain.com/api/v5/account/signin',
            array(
                'query' => array(
                    'email' => 'contact@rudloff.pro',
                    'password'=>'bahamut'
                )
            )
        );
        $json = json_decode($response->getBody());
        $this->_token = $json->meta->token;
    }

    /**
     * Get trips
     * @return Trip[]
     */
    function getTrips()
    {
        $response = $this->_client->request(
            'GET', 'https://www.captaintrain.com/api/v5/pnrs',
            array(
                'headers'=>array('Authorization'=>'Token token="'.$this->_token.'"')
            )
        );
        $json = json_decode($response->getBody());
        $trips = array();
        foreach ($json->trips as $tripInfo) {
            $trips[] = new Trip(
                $tripInfo->arrival_date, $tripInfo->departure_date,
                $tripInfo->arrival_station_id, $tripInfo->departure_station_id
            );
        }
        return $trips;
    }
}
