<?php

namespace App\controllers;

use App\Delegates\ReviewService;

class Reviews
{
  public function reviewEvent( $request, $response, $args )
  {
    $reviewService = new ReviewService();
    $datas = $request->getParsedBody();
    //logger
    $results = $reviewService->addReview( $datas, $args );
    return $response->withJson($results);
  }

  public function reviewsByUser( $request, $response, $args )
  {
    $reviewService = new ReviewService();
    $datas = $request->getParsedBody();
    //logger
    results = $reviewService->getReviewsByUser( $args );
  }

}

 ?>
