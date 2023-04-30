<?php

Flight::route('GET /api/vehicles', function () {
    Flight::json(Flight::vehicleService()->get_all());
});

Flight::route('POST /api/vehicle', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::vehicleService()->add($data));
});

Flight::route('GET /api/vehicles/@year', function ($year) {
    Flight::json(Flight::vehicleService()->getCarsProducedInCertainYear($year));
});
//This one needs to be checked again since it only shows me one output, however there are more, to be exact 5 outputs


Flight::route('DELETE /api/vehicle/@vehicle_id', function ($vehicle_id) {
    Flight::vehicleService()->delete($vehicle_id);
});

//2 routes still need to be checked and added
//They are written in the BookingRoutes.php

?>
