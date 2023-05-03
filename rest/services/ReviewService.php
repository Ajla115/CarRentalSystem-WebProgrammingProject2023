<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/ReviewDao.class.php";


class ReviewService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new ReviewDao);
        $this->dao = new ReviewDao(); 
        //I added this because it helped with certain routes, but is it neccesary
    }


    function getCarsWithCertainScores($review_score)
    {
        return $this->dao->getCarsWithCertainScores($review_score);
    }
}
?>
