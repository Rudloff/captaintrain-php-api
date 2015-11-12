<?php
namespace CaptainTrain;

class StationsManager
{
    private static $_instance;
    private $stations;

    function __construct()
    {
        if (($handle = fopen(__DIR__.'/../vendor/captaintrain/stations/stations.csv', 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ';')) !== false) {
                if ($data[0] != 'id') {
                    $this->stations[$data[0]] = new Station($data);
                }
            }
            fclose($handle);
        }
    }

    /**
     * Get singleton instance
     * @return StationsManager
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new StationsManager();
        }
        return self::$_instance;
    }

    function getById($id)
    {
        return $this->stations[$id];
    }
}
