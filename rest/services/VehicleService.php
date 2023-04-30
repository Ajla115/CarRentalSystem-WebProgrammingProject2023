<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/VehicleDao.class.php";


class VehicleService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new VehicleDao);
    }


    function getCarsProducedInCertainYear($year)
    {
        return $this->dao->getCarsProducedInCertainYear($year);
    }

}
?>

