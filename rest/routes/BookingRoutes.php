<?php
//works
//get all bookings from database
Flight::route('GET /api/bookings', function () {
    Flight::json(Flight::bookingService()->get_all());
}); 

//works
//add a new booking
Flight::route('POST /api/bookings', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::bookingService()->add($data));
});

//works
//but when I enter without PK, it gives me a random PK, quite bigger than autoincrementation, is that good or bad ?
//be careful, because here a parameter is a LOCATION id, and not a BOOKING id
//get all paid bookings based on a location
Flight::route('GET /api/bookings/paid/@location_id', function ($location_id) {
    Flight::json(Flight::bookingService()->getPaidBookingsPerLocation($location_id));
});

//works
//get all unpaid bookings based on a location
Flight::route('GET /api/bookings/unpaid/@location_id', function ($location_id) {
    Flight::json(Flight::bookingService()->getUnpaidBookingsPerLocation($location_id));
});

//does not work!
//delete all information regarding one booking based upon its id
Flight::route('DELETE /api/bookings/@booking_id', function ($booking_id) {
    Flight::bookingService()->delete($booking_id);
});

//This one doesn't work, needs to be checked!
//get all regarding one booking based on its id as parameter
Flight::route('GET /api/bookings/@booking_id', function ($booking_id) {
    Flight::json(Flight::bookingService()->get_by_id($booking_id));
});

//also doesn't work!
//update an existing booking
Flight::route("PUT api/bookings/@booking_id", function($booking_id){
    $data = Flight::request()->data->getData();
    Flight::json(['message' => 'Booking edited succesfully', 'data' => Flight::bookingService()->update($data, $booking_id)]); 
    //-> converts the results to the JSON form
    //This array we could have created above, store it in a variable, and then call that variable or do it directly like this
});

?>
