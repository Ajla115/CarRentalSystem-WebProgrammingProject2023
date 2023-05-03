<?php
//works
//get all information about all locations
Flight::route('GET /api/locations', function () {
    Flight::json(Flight::locationService()->get_all());
});

//works
//add a new location
Flight::route('POST /api/locations', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::locationService()->add($data));
});

//this one does not work
Flight::route('GET /api/locations/rental/@location_id', function ($location_id) {
    Flight::json(Flight::locationService()->getRentalShopBasedOnACity($location_id));
});

//does not work
Flight::route('GET /api/locations/contact/@location_id', function ($location_id) {
    Flight::json(Flight::locationService()->getContactInfo($location_id));
});

//does not work
Flight::route('DELETE /api/locations/@location_id', function ($location_id) {
    Flight::locationService()->delete($location_id);
});

//does not work
Flight::route('GET /api/locations/@location_id', function ($location_id) {
    Flight::json(Flight::locationService()->get_by_id($location_id));
});

//does not work
Flight::route("PUT api/locations/@location_id", function($location_id){
    $data = Flight::request()->data->getData();
    Flight::json(['message' => 'Location edited succesfully', 'data' => Flight::locationService()->update($data, $location_id)]); 
    //-> converts the results to the JSON form
    //This array we could have created above, store it in a variable, and then call that variable or do it directly like this
});


//This route where I uses JOINS because I have two tables connected is making a problem
/*Flight::route('GET /api/location/bookings/@location_id', function ($location_id) {
    Flight::json(Flight::locationService()->getNumberOfBookingsPerLocation($location_id));
});*/
?>
