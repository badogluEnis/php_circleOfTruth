<?php


class LogoutController {

  public function index()
  {

  $_Session ['loggedin'] = false;
  session_destroy();

  header("Location: /");
  $view->heading = 'Circle of truth';
  }
}

?>
