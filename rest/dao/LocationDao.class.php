<?php
require_once __DIR__ . '/BaseDao.class.php';


class LocationDao extends BaseDao
{
    public function __construct()
    {
        parent::__construct("locations");
    }


    // This is custom function, which is not present in BaseDao, and it will return number of bookings per locations
    // query_unique -> returns only 1 result if multiple are present
    //For some reason, it just returns false. I don't know why, but perhaps ALIASES are problem.
    /*function getNumberOfBookingsPerLocation($location_id)
    {
        return $this->query_unique("SELECT COUNT(b.booking_id)
        FROM bookings b
        JOIN locations l ON b.location_id = l.location_id
        WHERE l.location_id = :l.location_id", ["location_id" => $location_id]); 
    }*/
    
    
    //This is a custom function to get a rentshop depending on the city
    function getRentalShopBasedOnACity($location_id)  //instead of location_id, write 1,2,3..
    {
        return $this->query_unique("SELECT *
        FROM locations
        WHERE location_id = :location_id", ["location_id" => $location_id]);
    }

    /*SELECT *
    FROM locations
    WHERE location_id = 1; --> this is how it would be written in MySQL */

    //This is a custom function to get contact info from certain location
    function getContactInfo($location_id)  
    {
        return $this->query_unique("SELECT email, phone
        FROM locations
        WHERE location_id = :location_id", ["location_id" => $location_id]);
    }



}

?>
