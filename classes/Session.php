<?php
namespace CaptainTrain;

class Session
{
    private $token;
    private $client;

    function __construct($email, $password)
    {
        $this->client = new \GuzzleHttp\Client();
        $response = $this->client->request(
            'POST', 'https://www.captaintrain.com/api/v5/account/signin',
            array(
                'query' => array(
                    'email' => 'contact@rudloff.pro',
                    'password'=>'bahamut'
                )
            )
        );
        $json = json_decode($response->getBody());
        $this->token = $json->meta->token;
    }

    function getTrips()
    {
        $response = $this->client->request(
            'GET', 'https://www.captaintrain.com/api/v5/pnrs',
            array(
                'headers'=>array('Authorization'=>'Token token="'.$this->token.'"')
            )
        );
        $json = json_decode($response->getBody());
        $trips = array();
        foreach ($json->trips as $tripInfo) {
            $trips[] = new Trip($tripInfo->arrival_date, $tripInfo->departure_date, $tripInfo->arrival_station_id, $tripInfo->departure_station_id);
        }
        return $trips;
    }
}
