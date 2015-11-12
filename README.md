# captaintrain-php-api
Small library that helps you build applications that communicate with the Captain Train API

##How to use
###Get trips
    $session = new \CaptainTrain\Session('youremail', 'yourpassword');
    $trips = $session->getTrips();
