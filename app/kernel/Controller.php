<?php

class Controller {
  protected $model;
  protected $view;

  public function __construct()
  {
    $this->view = new View();
    Session::set('controller_name', get_class($this));
  }

  public function loadModel() {
    $model_name = get_class($this) . 'Model';
    $model_file = 'model/' . $model_name . '.php';
    // Load modal file
    if (file_exists($model_file)) {
      require $model_file;
      $this->model = new $model_name;
    }
  }

}