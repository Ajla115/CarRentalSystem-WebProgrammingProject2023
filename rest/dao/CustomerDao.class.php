<?php
require_once __DIR__ . '/BaseDao.class.php';


class CustomerDao extends BaseDao
{
    public function __construct()
    {
        parent::__construct("customers");
    }


    // custom function, which is not present in BaseDao
    // query_unique -> returns only 1 result if multiple are present
    function getCustomerByFirstNameAndLastName($customer_name, $customer_surname)
    {
        return $this->query_unique("SELECT * FROM customers WHERE customer_name = :customer_name AND customer_surname = :customer_surname", ["customer_name" => $customer_name, "customer_surname" => $customer_surname]);
    }
}
?>
