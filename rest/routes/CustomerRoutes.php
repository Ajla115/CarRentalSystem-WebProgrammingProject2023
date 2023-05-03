<?php
//works
//get all customers from database
Flight::route('GET /api/customers', function () {
    Flight::json(Flight::customerService()->get_all());
});

//doesn't work
//get all information regarding one customer based upon its id as a parameter
Flight::route('GET /api/customers/@customer_id', function ($customer_id) {
    Flight::json(Flight::customerService()->get_by_id($customer_id));
});

//does not work
//get all information regarding one customer based upon its name and surname as parameters
Flight::route('GET /api/customers/@customer_name/@customer_surname', function ($customer_name, $customer_surname) {
    Flight::json(Flight::customerService()->getCustomerByFirstNameAndLastName($customer_name, $customer_surname));
});

//works
//add a new customer to the database
Flight::route('POST /api/customers', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::customerService()->add($data));
});

//does not work
//update an existing customer based upon its id as a parameter
Flight::route('PUT /api/customers/@customer_id', function ($customer_id) {
    $data = Flight::request()->data->getData();
    Flight::customerService()->update($customer_id, $data);
    Flight::json(Flight::customerService()->get_by_id($customer_id));
});

//does not work
//delete one customer based upon its id as a parameter
Flight::route('DELETE /api/customers/@customer_id', function ($customer_id) {
    Flight::customerService()->delete($customer_id);
});


?>
