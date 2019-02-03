<?php
namespace App\controller;

use App\delegate\Registration;
use App\delegate\Login;
use App\utils\DB_Logger;

class RegisterLogin
{

  private $registration, $login, $logger;

  public function __construct(){
    $this->registration = new Registration();
    $this->login = new Login();
    $this->logger = new DB_Logger();
  }

  //Registration Controllers
  public function registerSubmit($request, $response, $args) {
      $datas = $request->getParsedBody();
      $this->logger->log("info","Registeration request for the following data " . " " . json_encode($datas) );
      $registerResponse = $this->registration->registerUser($datas);
      $registerResponse["messagecode"] = $response->getStatusCode();
      return $response->withJson($registerResponse);

  }


  public function loginSubmit ( $request,  $response,  $args) {

    $datas = $request->getParsedBody();
    $this->logger->log("info", "Login request for the userEmail " . " " . json_encode($datas) );
    $loginResponse = $this->login->loginUser($datas);
    $loginResponse["messagecode"] = $response->getStatusCode();
    $loginResponse["userId"] = $_SESSION['userId'];
    // echo $_SESSION['userId'];
    return $response->withJson($loginResponse);
  }

}
 ?>
