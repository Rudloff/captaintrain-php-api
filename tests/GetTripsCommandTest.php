<?php
/**
 * GetTripsCommandTest class.
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
use CaptainTrain\GetTripsCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Test GetTripsCommand class.
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
class GetTripsCommandTest extends PHPUnit_Framework_TestCase
{
    /**
     * Setup tests.
     *
     * @return void
     */
    protected function setUp()
    {
        $application = new Application();
        $application->add(new GetTripsCommand());

        $this->command = $application->find('get:trips');
        $this->commandTester = new CommandTester($this->command);
    }

    /**
     * Test execute without arguments.
     *
     * @return void
     * @expectedException RuntimeException
     */
    public function testExecuteWithoutArgument()
    {
        $this->commandTester->execute(
            [
                'command' => $this->command->getName(),
            ]
        );
    }

    /**
     * Test execute with wrong credentials.
     *
     * @return void
     * @expectedException Exception
     */
    public function testExecuteError()
    {
        $this->commandTester->execute(
            [
                'command'  => $this->command->getName(),
                'email'    => 'foo',
                'password' => 'bar',
            ]
        );
    }

    /**
     * Test execute with wrong credentials.
     *
     * @return void
     * @expectedException Exception
     */
    public function testExecute()
    {
        $this->commandTester->execute(
            [
                'command'  => $this->command->getName(),
                'email'    => 'foo',
                'password' => 'bar',
            ]
        );
    }
}
