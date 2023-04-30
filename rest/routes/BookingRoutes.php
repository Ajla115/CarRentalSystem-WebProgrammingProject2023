<?php

Flight::route('GET /api/bookings', function () {
    Flight::json(Flight::bookingService()->get_all());
});

Flight::route('POST /api/bookings', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::bookingService()->add($data));
});

Flight::route('GET /api/bookings/@location_id', function ($location_id) {
    Flight::json(Flight::bookingService()->getPaidBookingsPerLocation($location_id));
});


Flight::route('DELETE /api/booking/@booking_id', function ($booking_id) {
    Flight::bookingService()->delete($booking_id);
});

//This one needs to be checked because I am not sure how to connect get_by_customer_id function with booking in this specific context
/*Flight::route('GET /api/bookings/@booking_id', function ($booking_id) {
    Flight::json(Flight::bookingService()->get_by_customer_id($booking_id));
});*/


//This one still needs to be adapted to bookingRoutes
/*Flight::route('PUT /api/customers/@customer_id', function ($customer_id) {
    $data = Flight::request()->data->getData();
    Flight::customerService()->update($customer_id, $data);
    Flight::json(Flight::customerService()->get_by_customer_id($customer_id));
});*/

?>
