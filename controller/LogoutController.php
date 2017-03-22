<?php


class LogoutController {

  public function index()
  {

  $_Session ['loggedin'] = false;
  session_destroy();

header("Location: /");
}

}


?>
