<?php

class DB extends \PDO {
  public function __construct()
  {
    try {
      $dsn = DB_TYPE . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME;

      $userName = DB_USER;
      $password = DB_PASS;

      parent::__construct($dsn, $userName, $password /*, $options */);
    }
    catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
}