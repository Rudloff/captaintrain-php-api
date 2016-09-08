<?php
/**
 * StationsManagerTest class.
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
use CaptainTrain\StationsManager;

/**
 * Test StationsManager class.
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
class StationsManagerTest extends PHPUnit_Framework_TestCase
{
    /**
     * Setup tests.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->stations = StationsManager::getInstance();
    }

    /**
     * Test getById function.
     *
     * @return void
     */
    public function testGetById()
    {
        $station = $this->stations->getById(153);
        $this->assertEquals('Strasbourg', $station->name);
    }
}
