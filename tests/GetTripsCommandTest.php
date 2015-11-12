<?php

use CaptainTrain\GetTripsCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class GetTripsCommandTest extends PHPUnit_Framework_TestCase
{
    /**
     * Setup tests
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
     * Test execute without arguments
     * @return void
     * @expectedException RuntimeException
     */
    public function testExecuteWithoutArgument()
    {
        $this->commandTester->execute(
            array(
                'command' => $this->command->getName()
            )
        );
    }

    /**
     * Test execute with wrong credentials
     * @return void
     * @expectedException Exception
     */
    public function testExecuteError()
    {
        $this->commandTester->execute(
            array(
                'command' => $this->command->getName(),
                'email'=>'foo',
                'password'=>'bar'
            )
        );
    }

    /**
     * Test execute with wrong credentials
     * @return void
     * @expectedException Exception
     */
    public function testExecute()
    {
        $this->commandTester->execute(
            array(
                'command' => $this->command->getName(),
                'email'=>'foo',
                'password'=>'bar'
            )
        );
    }
}
