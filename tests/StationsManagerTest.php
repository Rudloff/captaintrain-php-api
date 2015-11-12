<?php

use CaptainTrain\StationsManager;

class StationsManagerTest extends PHPUnit_Framework_TestCase
{
    /**
     * Setup tests
     * @return void
     */
    protected function setUp()
    {
        $this->stations = StationsManager::getInstance();
    }

    public function testGetById() {
        $station = $this->stations->getById(153);
        $this->assertEquals('Strasbourg', $station->name);
    }
}
