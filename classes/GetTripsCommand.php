<?php
/**
 * GetTripsCommand class
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
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
/**
 * CLI get:trips command
 *
 * PHP version 5.6
 *
 * @category CaptainTrain
 * @package  CaptainTrain
 * @author   Pierre Rudloff <contact@rudloff.pro>
 * @license  LGPL https://www.gnu.org/copyleft/lesser.html
 * @link     https://github.com/Rudloff/captaintrain-php-api
 */
class GetTripsCommand extends Command
{
    /**
     * Configure command
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('get:trips')
            ->setDescription('Get trips')
            ->addArgument(
                'email',
                InputArgument::REQUIRED,
                'E-mail address'
            )
            ->addArgument(
                'password',
                InputArgument::REQUIRED,
                'Password'
            );
    }
    /**
     * Execute command
     * @param  InputInterface  $input  Input
     * @param  OutputInterface $output Output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $session = new \CaptainTrain\Session(
            $input->getArgument('email'), $input->getArgument('password')
        );

        foreach ($session->getTrips() as $trip) {
            $output->writeln(
                $trip->departureStation->name.' - '.$trip->arrivalStation->name.
                ':'.PHP_EOL.'    '.
                $trip->departureDate->format('r').' - '.
                $trip->arrivalDate->format('r')
            );
        }
    }
}
