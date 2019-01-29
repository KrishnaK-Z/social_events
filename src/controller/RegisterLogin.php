<?php
namespace App\controller;

use App\delegate\Registration;
use App\delegate\Login;
// use App\delegate\AllUsersDelegate;

class RegisterLogin extends BaseController
{


  //Registration Controllers
  public function registerSubmit($request, $response, $args) {

      $registration = new Registration();
      $datas = $request->getParsedBody();
      // $this->c->logger->info("Registeration request for the following data " . " " . json_encode($datas) );
      $registerResponse = $registration->registerUser($datas);
      return $response->withJson($registerResponse);

  }


  public function loginSubmit ( $request,  $response,  $args) {
    $login = new Login();
    $datas = $request->getParsedBody();
    $this->c->logger->info("Login request for the userEmail " . " " . json_encode($datas) );
    $loginResponse = $login->loginUser($datas);
    // echo $_SESSION['userId'];
    return $resposne->$loginResponse;
  }

}
 ?>
