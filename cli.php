<?php
require_once 'vendor/autoload.php';
use CaptainTrain\GetTripsCommand;
use Symfony\Component\Console\Application;
$application = new Application();
$application->add(new GetTripsCommand());
$application->run();
