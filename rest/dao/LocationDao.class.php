<?php
require_once __DIR__ . '/BaseDao.class.php';


class LocationDao extends BaseDao
{
    public function __construct()
    {
        parent::__construct("locations");
    }


    // custom function, which is not present in BaseDao
    // query_unique -> returns only 1 result if multiple are present
    //return number of bookings per locations
    function getNumberOfBookingsPerLocation($location_id)
    {
        return $this->query_unique("SELECT COUNT(b.booking_id)
        FROM bookings b
        JOIN locations l ON b.location_id = l.location_id
        WHERE l.location_id = :l.location_id", ["l.location_id" => $location_id]); //especially here
    }
    
    //this one needs to be checked because of these ALIASES
    //custom function to get a rentshop depending on the city

    function getRentalShopBasedOnACity($town)
    {
        return $this->query_unique("SELECT *
        FROM locations
        WHERE town = :town", ["town" => $town]);
    }

    /*SELECT *
    FROM locations
    WHERE town = 'Sarajevo';  for an example
*/


}
?>
