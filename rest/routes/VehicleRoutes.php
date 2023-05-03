<?php
//works
//get information about all vehicles
Flight::route('GET /api/vehicles', function () {
    Flight::json(Flight::vehicleService()->get_all());
});

//I assume this one will work as well, since all POST functions have worked so far
Flight::route('POST /api/vehicle', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::vehicleService()->add($data));
});

//does not work 
Flight::route('GET /api/vehicles/year/@year', function ($year) {
    Flight::json(Flight::vehicleService()->getCarsProducedInCertainYear($year));
});

//does not work
Flight::route('DELETE /api/vehicles/@vehicle_id', function ($vehicle_id) {
    Flight::vehicleService()->delete($vehicle_id);
});

//does not work
Flight::route('GET /api/vehicles/@vehicle_id', function ($vehicle_id) {
    Flight::json(Flight::vehicleService()->get_by_id($vehicle_id));
});

//does not work
Flight::route("PUT api/vehicles/@vehicle_id", function($vehicle_id){
    $data = Flight::request()->data->getData();
    Flight::json(['message' => 'Vehicle info edited succesfully', 'data' => Flight::vehicleService()->update($data, $vehicle_id)]); 
    //-> converts the results to the JSON form
    //This array we could have created above, store it in a variable, and then call that variable or do it directly like this
});


?>
