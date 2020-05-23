<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include 'config/config.php';
include 'kernel/DB.php';
include 'kernel/Session.php';
Session::start();

/* MVC */
include 'kernel/Model.php';
include 'kernel/View.php';
include 'kernel/Controller.php';

/* Run application */
include 'kernel/Core.php';
$app = new Core();
