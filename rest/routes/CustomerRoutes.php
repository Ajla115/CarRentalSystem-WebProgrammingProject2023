<?php
Flight::route('GET /api/customers', function () {
    Flight::json(Flight::customerService()->get_all());
});


Flight::route('GET /api/customers/@customer_id', function ($customer_id) {
    Flight::json(Flight::customerService()->get_by_customer_id($customer_id));
});


Flight::route('GET /api/customer/@firstName/@lastName', function ($customer_name, $customer_surname) {
    Flight::json(Flight::customerService()->getCustomerByFirstNameAndLastName($customer_name, $customer_surname));
});


Flight::route('POST /api/customers', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::customerService()->add($data));
});


Flight::route('PUT /api/customers/@customer_id', function ($customer_id) {
    $data = Flight::request()->data->getData();
    Flight::customerService()->update($customer_id, $data);
    Flight::json(Flight::customerService()->get_by_customer_id($customer_id));
});


Flight::route('DELETE /api/customer/@customer_id', function ($customer_id) {
    Flight::customerService()->delete($customer_id);
});


?>
