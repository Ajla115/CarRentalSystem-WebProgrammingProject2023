<?php

Flight::route('GET /api/employees', function () {
    Flight::json(Flight::employeeService()->get_all());
});

Flight::route('POST /api/employee', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::employeeService()->add($data));
});

Flight::route('GET /api/employees/@employee_id/@location_id', function ($employee_id, $location_id) {
    Flight::json(Flight::employeeService()->getEmployeeByIdAndLocationId($employee_id, $location_id));
});


Flight::route('DELETE /api/employee/@employee_id', function ($employee_id) {
    Flight::bookingService()->delete($employee_id);
});

//2 routes still need to be checked and added
//They are written in the BookingRoutes.php

?>
