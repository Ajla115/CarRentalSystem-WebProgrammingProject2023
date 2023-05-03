<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/LocationDao.class.php";


class LocationService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new LocationDao);
    }


    /*function getNumberOfBookingsPerLocation($location_id)
    {
        return $this->dao->getNumberOfBookingsPerLocation($location_id);
    }*/

    function getRentalShopBasedOnACity($location_id)
    {
        return $this->dao->getRentalShopBasedOnACity($location_id);
    }

    function getContactInfo($location_id) 
    {
        return $this->dao->getContactInfo($location_id);
    }

     
}
?>
