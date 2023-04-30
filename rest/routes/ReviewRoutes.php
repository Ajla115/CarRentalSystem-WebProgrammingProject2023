<?php

Flight::route('GET /api/reviews', function () {
    Flight::json(Flight::reviewService()->get_all());
});

Flight::route('POST /api/review', function () {
    $data = Flight::request()->data->getData();
    Flight::json(Flight::reviewService()->add($data));
});

Flight::route('GET /api/reviews/@review_score', function ($review_score) {
    Flight::json(Flight::reviewService()->getCarsWithCertainScores($review_score));
});


Flight::route('DELETE /api/review/@review_id', function ($review_id) {
    Flight::reviewService()->delete($review_id);
});

//2 routes still need to be checked and added
//They are written in the BookingRoutes.php

?>
