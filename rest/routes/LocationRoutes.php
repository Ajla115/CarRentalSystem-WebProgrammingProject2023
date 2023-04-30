<?php

Flight::route('GET /api/locations', function () {
    Flight::json(Flight::locationService()->get_all());
});

Flight::route('POST /api/location', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::locationService()->add($data));
});

Flight::route('GET /api/location/@town', function ($town) {
    Flight::json(Flight::locationService()->getRentalShopBasedOnACity($town));
});

//This route where I uses JOINS because I have two tables connected is making a problem
/*Flight::route('GET /api/location/@location_id', function ($location_id) {
    Flight::json(Flight::locationService()->getNumberOfBookingsPerLocation($location_id));
});*/

Flight::route('DELETE /api/location/@location_id', function ($location_id) {
    Flight::locationService()->delete($location_id);
});

//2 routes still need to be checked and added
//They are written in the BookingRoutes.php

?>
