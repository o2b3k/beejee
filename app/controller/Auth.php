<?php

class Auth extends Controller {
  public function index()
  {
    $this->view->render('auth/login');
  }

  public function login()
  {
    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $data = $_POST;
      $login = $this->model->login($data);
      if (!$login){
        $this->view->message = true;
      } else {
        Session::set('user', $login);
        header("Location: " . "/home/admin");
      }
    }
  }

  public function logout()
  {
    Session::remove('user');
    header("Location: " . URL);
  }

}