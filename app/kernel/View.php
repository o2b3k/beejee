<?php

class View {
  private $render = false;

  public function render($view)
  {
    if (!$this->render){
      $this->render = true;
      require 'partials/header.php';
      require 'partials/navbar.php';
      require 'view/' . $view . '.php';
      require 'partials/footer.php';
    }
  }
}