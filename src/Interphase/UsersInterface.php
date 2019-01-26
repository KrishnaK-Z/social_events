<?php

namespace App\Interphase;


interface UsersInterface
{

  public function setUserId($user_id);

  public function getUserId();

  public function setUserName($user_name);

  public function getUserNAme();

  /**
       * Set User Email
       *
       * @param string $user_email
       * @return $this
       */
  public function setUserEmail($user_email);

  /**
       * Get User Email
       *
       * @return string
       */
  public function getUserEmail();

  public function setUserPassword($user_password);

  public function getUserPassword();

  public function setProfilePics($profile_pics);

  public function getProfilePics();

  public function setPhoneNumber($phone_number);

  public function getPhoneNumber();

  public function setOrganisationWebsite($organisation_website);

  public function getOrganisationWebsite();


}

 ?>
