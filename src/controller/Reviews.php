<?php

namespace App\controllers;

use App\Delegates\ReviewService;

class Reviews extends BaseController
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
    //logger
    results = $reviewService->getReviewsByUser();
    return $response->withJson($results);
  }
  public function reviewsForEvent( $request, $response, $args )
  {
    $reviewService = new ReviewService();
    //logger
    results = $reviewService->getReviewsForEvent($args);
    return $response->withJson($results);
  }
  public function reviewByuserForEvent( $request, $response, $args )
  {
    $reviewService = new ReviewService();
    //logger
    results = $reviewService->getReviewsByUserForEvent($args);
    return $response->withJson($results);
  }

}

 ?>
