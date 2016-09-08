<?php
/**
 * CLI.
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
require_once 'vendor/autoload.php';
use CaptainTrain\GetTripsCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new GetTripsCommand());
$application->run();
