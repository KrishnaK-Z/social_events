<?php

namespace App\controllers;

use App\Delegates\ReviewService;
use App\utils\DB_Logger;

class Reviews
{


  private $reviewService, $logger;

  public function __construct(){
    parent::__construct();
    $this->reviewService = new ReviewService();
    $this->logger = new DB_Logger();
  }



  public function reviewEvent( $request, $response, $args )
  {
    $datas = $request->getParsedBody();
    $results = $this->reviewService->addReview( $datas, $args );
    return $response->withJson($results);
  }



  public function reviewsByUser( $request, $response, $args )
  {
    results = $this->reviewService->getReviewsByUser();
    return $response->withJson($results);
  }



  public function reviewsForEvent( $request, $response, $args )
  {
    results = $this->reviewService->getReviewsForEvent($args);
    return $response->withJson($results);
  }



  public function reviewByuserForEvent( $request, $response, $args )
  {
    results = $this->reviewService->getReviewsByUserForEvent($args);
    return $response->withJson($results);
  }

}

 ?>
